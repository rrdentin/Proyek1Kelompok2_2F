<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\PDF;

class SiswaController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();

        if ($user->level == 'admin') {

            $siswas = Siswa::with('pendaftar')->paginate(5);
            $pendaftars = Pendaftar::all();
            $siswas = [];

            if ($pendaftars->isNotEmpty()) {
                $pendaftarIds = $pendaftars->pluck('id')->toArray();
                $siswas = Siswa::whereIn('pendaftar_id', $pendaftarIds)
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
            }

            return view('admin.siswa', compact('pendaftars', 'siswas'));
        } elseif ($user->level == 'panitia') {
            $pendaftars = Pendaftar::all();
            $siswas = [];

            if ($pendaftars->isNotEmpty()) {
                $pendaftarIds = $pendaftars->pluck('id')->toArray();
                $siswas = Siswa::whereIn('pendaftar_id', $pendaftarIds)
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
            }

            return view('panitia.siswa', compact('pendaftars', 'siswas'));
        } elseif ($user->level == 'user') {
            $pendaftars = Pendaftar::where('user_id', $user->id)->get();
            $siswas = [];

            if ($pendaftars->isNotEmpty()) {
                $pendaftarIds = $pendaftars->pluck('id')->toArray();
                $siswas = Siswa::whereIn('pendaftar_id', $pendaftarIds)
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
            }

            return view('user.dashboard.siswa', compact('pendaftars', 'siswas'));
        }

        // Handle other levels or no level assigned
        return redirect()->back()->with('error', 'Unauthorized access.');
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        $pendaftar = $siswa->pendaftar;
        $user = $pendaftar->user;

        return view('siswa.show', compact('siswa', 'pendaftar', 'user'));
    }
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $pendaftar = $siswa->pendaftar;
        return view('siswa.edit', compact('siswa', 'pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|unique:siswas,nis',
            'name' => 'required',
            'name_wali' => 'required',
            'user_jenKel' => 'required',
            'pendaftar_jenKel' => 'required',
            'alamat' => 'required',
            'tglLahir' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'akte' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jenjangPend' => 'required|in:TK,Paud',
            'nik' => 'required|unique:pendaftars,nik',
            'tempatLahir' => 'required',
            'noHp' => 'required',
        ]);

        $validator->after(function ($validator) use ($request, $id) {
            $siswa = Siswa::findOrFail($id);
            $existingPendaftar = Pendaftar::where('name', $request->input('name'))
                ->where('tempatLahir', $request->input('tempatLahir'))
                ->where('tglLahir', $request->input('tglLahir'))
                ->where('id', '!=', $siswa->pendaftar_id)
                ->first();

            if ($existingPendaftar) {
                $validator->errors()->add('name', 'Sudah ada Pendaftar dengan data Nama, Tempat Lahir, dan Tanggal Lahir tersebut.');
            }
        });

        // Validate input fields
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $siswa = Siswa::findOrFail($id);
        $siswa->nis = $request->input('nis');
        $siswa->save();

        // Update pendaftar data
        $pendaftar = $siswa->pendaftar;
        $pendaftar->name = $request->name;
        $pendaftar->name_wali = $request->name_wali;
        $pendaftar->jenKel = $request->input('pendaftar_jenKel');
        $pendaftar->alamat = $request->alamat;
        $pendaftar->tglLahir = $request->tglLahir;
        $pendaftar->jenjangPend = $request->jenjangPend;
        $pendaftar->tempatLahir = $request->tempatLahir;
        $pendaftar->nik = $request->input('nik');

        // Update image files if provided
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($pendaftar->foto);
            $pendaftar->foto = $request->file('foto')->store('images', 'public');
        }
        if ($request->hasFile('akte')) {
            Storage::disk('public')->delete($pendaftar->akte);
            $pendaftar->akte = $request->file('akte')->store('images', 'public');
        }
        if ($request->hasFile('kk')) {
            Storage::disk('public')->delete($pendaftar->kk);
            $pendaftar->kk = $request->file('kk')->store('images', 'public');
        }
        $pendaftar->save();

        $user = $siswa->user;
        $user->noHp = $request->noHp;
        $user->jenKel = $request->input('user_jenKel');
        $user->save();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $pendaftar = Pendaftar::where('siswa_id', $id)->first();
        $pendaftar->status = 'pending';
        $pendaftar->save();

        $siswa->delete();

        return redirect()->back()->with('success', 'Siswa berhasil dihapus.');
    }

    public function print($id)
    {
        $user = Auth::user();
        $siswa = Siswa::findOrFail($id);

        if ($user->level == 'admin') {
            $siswa = Siswa::where('id', $id)->first();

            if (!$siswa) {
                return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
            }

            $pdf = PDF::loadView('siswa.print', ['siswa' => $siswa]);
            return $pdf->stream();
        } elseif ($user->level == 'panitia') {
            $siswa = Siswa::where('id', $id)->first();

            if (!$siswa) {
                return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
            }

            $pdf = PDF::loadView('siswa.print', ['siswa' => $siswa]);
            return $pdf->stream();
        } elseif ($user->level == 'user') {
            $siswa = Siswa::where('id', $id)->first();

            if (!$siswa) {
                return redirect()->back()->with('error', 'Siswa tidak ditemukan.');
            }

            $pdf = PDF::loadView('siswa.print', ['siswa' => $siswa]);
            return $pdf->stream();
        }
    }
}

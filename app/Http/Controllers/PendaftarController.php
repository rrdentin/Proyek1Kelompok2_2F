<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class PendaftarController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
    
        if ($user->level == 'admin') {
            $pendaftars = Pendaftar::all();
            return view('admin.pendaftar.dashboard', compact('pendaftars'));
        } elseif ($user->level == 'panitia') {
            return view('panitia.pendaftar.dashboard');
        } elseif ($user->level == 'user') {
            $pendaftar = Pendaftar::where('user_id', $user->id)->get();
        $pendaftars = [$pendaftar];
        return view('user.dashboard.pendaftar', compact('pendaftars'));
        }
    
        // Handle other levels or no level assigned
        return redirect()->back()->with('error', 'Unauthorized access.');
    }

    public function create()
    {
        $user = Auth::user();
        return view('pendaftar.create', compact('user'));
    }

    public function store(Request $request)
{
    // Validate input fields
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'name_wali' => 'required',
        'user_jenKel' => 'required',
        'pendaftar_jenKel' => 'required',
        'alamat' => 'required',
        'tglLahir' => 'required',
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'akte' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'kk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'jenjangPend' => 'required|in:TK,Paud',
        'nik' => 'required|unique:pendaftars,nik',
        'tempatLahir' => 'required',
        'noHp' => 'required',
    ]);
 $validator->after(function ($validator) use ($request) {
        $existingPendaftar = Pendaftar::where('name', $request->input('name'))
            ->where('tempatLahir', $request->input('tempatLahir'))
            ->where('tglLahir', $request->input('tglLahir'))
            ->first();

        if ($existingPendaftar) {
            $validator->errors()->add('name', 'Sudah ada Pendaftar dengan data Nama, Tempat Lahir, dan Tanggal Lahir tersebut.');
        }
    });

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Upload image files
    $image_name = $request->file('foto')->store('images', 'public');
    $akte_name = $request->file('akte')->store('images', 'public');
    $kk_name = $request->file('kk')->store('images', 'public');

    // Find the existing user
    $user = User::findOrFail($request->input('user_id'));

    // Update the user's fields
    $user->jenKel = $request->input('user_jenKel');
    $user->noHp = $request->input('noHp');
    $user->save();

    // Create a new pendaftar
    $pendaftar = new Pendaftar;
    $pendaftar->user_id = $user->id;
    $pendaftar->name = $request->input('name');
    $pendaftar->name_wali = $request->input('name_wali');
    $pendaftar->jenKel = $request->input('pendaftar_jenKel');
    $pendaftar->alamat = $request->input('alamat');
    $pendaftar->tglLahir = $request->input('tglLahir');
    $pendaftar->foto = $image_name;
    $pendaftar->akte = $akte_name;
    $pendaftar->kk = $kk_name;
    $pendaftar->jenjangPend = $request->input('jenjangPend');
    $pendaftar->nik = $request->input('nik');
    $pendaftar->tempatLahir = $request->input('tempatLahir');
    $pendaftar->status = 'pending';
    $pendaftar->save();

    return redirect()->route('pendaftar.dashboard')->with('success', 'Pendaftaran berhasil disimpan.');
}

    public function show($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('pendaftar.show', compact('pendaftar'));
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        if (!$pendaftar->isEditable()) {
            return redirect()->route('pendaftar.dashboard')->with('error', 'Tidak dapat mengedit pendaftaran yang sudah diproses.');
        }

        return view('pendaftar.edit', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        if (!$pendaftar->isEditable()) {
            return redirect()->route('pendaftar.dashboard')->with('error', 'Tidak dapat mengedit pendaftaran yang sudah diproses.');
        }

        // Validate input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'name_wali' => 'required',
            'jenKel' => 'required',
            'alamat' => 'required',
            'tglLahir' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'akte' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jenjangPend' => 'required|in:TK,Paud',
            'nik' => 'required|unique:pendaftars,nik,' . $pendaftar->id,
            'tempatLahir' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update pendaftar data
        $pendaftar->name = $request->name;
        $pendaftar->name_wali = $request->name_wali;
        $pendaftar->jenKel = $request->jenKel;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->tglLahir = $request->tglLahir;
        $pendaftar->jenjangPend = $request->jenjangPend;
        $pendaftar->nik = $request->nik;
        $pendaftar->tempatLahir = $request->tempatLahir;

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

        return redirect()->route('pendaftar.dashboard')->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        if (!$pendaftar->isEditable()) {
            return redirect()->route('pendaftar.dashboard')->with('error', 'Tidak dapat menghapus pendaftaran yang sudah diproses.');
        }

        // Delete image files
        Storage::disk('public')->delete($pendaftar->foto);
        Storage::disk('public')->delete($pendaftar->akte);
        Storage::disk('public')->delete($pendaftar->kk);

        // Delete the pendaftar
        $pendaftar->delete();

        return redirect()->route('pendaftar.dashboard')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\PDF;

class PendaftarController extends Controller
{
    public function dashboard(Request $request){
    $user = Auth::user();

    if ($user->level == 'admin') {
        $pembayarans = Pembayaran::orderBy('created_at', 'desc');

        // Filter by name, name_wali, jenjangPend, status
        if ($request->has('search')) {
            $search = $request->input('search');
            $pembayarans = $pembayarans->whereHas('pendaftar', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('name_wali', 'like', '%' . $search . '%')
                    ->orWhere('jenjangPend', 'like', '%' . $search . '%');
            })->orWhere('status', 'like', '%' . $search . '%');
        }

        $pembayarans = $pembayarans->paginate(5);

        return view('admin.pembayaran', compact('pembayarans'));
    } elseif ($user->level == 'panitia') {
        // ...
    } elseif ($user->level == 'user') {
        $pendaftar = Pendaftar::where('user_id', $user->id)->first();
        $pembayarans = [];

        if ($pendaftar) {
            $pembayarans = Pembayaran::where('pendaftar_id', $pendaftar->id)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }

        return view('user.dashboard.pembayaran', compact('pembayarans'));
    }

    // Handle other levels or no level assigned
    return redirect()->back()->with('error', 'Unauthorized access.');
    }

    public function store(Request $request){
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

   // Set jumlah berdasarkan jenjangPend
    if ($pendaftar->jenjangPend == 'TK') {
        $jumlah = 200000;
    } elseif ($pendaftar->jenjangPend== 'Paud') {
        $jumlah = 150000;
    }

$pembayaran = new Pembayaran;
$pembayaran->pendaftar_id = $pendaftar->id;
$pembayaran->jumlah = $jumlah;
$pembayaran->status = 'bayar'; // Set status sebagai "bayar" secara default
$pembayaran->save();
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

    $validator = Validator::make($request->all(), [
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
        'tempatLahir' => 'required',
        'noHp' => 'required',
    ]);

    $validator->after(function ($validator) use ($request, $pendaftar) {
        $existingPendaftar = Pendaftar::where('name', $request->input('name'))
            ->where('tempatLahir', $request->input('tempatLahir'))
            ->where('tglLahir', $request->input('tglLahir'))
            ->where('id', '!=', $pendaftar->id)
            ->first();

        if ($existingPendaftar) {
            $validator->errors()->add('name', 'Sudah ada Pendaftar dengan data Nama, Tempat Lahir, dan Tanggal Lahir tersebut.');
        }
    });

    // Validate input fields
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Update pendaftar data
    $pendaftar->name = $request->name;
    $pendaftar->name_wali = $request->name_wali;
    $pendaftar->jenKel = $request->input('pendaftar_jenKel');
    $pendaftar->alamat = $request->alamat;
    $pendaftar->tglLahir = $request->tglLahir;
    $pendaftar->jenjangPend = $request->jenjangPend;
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

    // Update related User model
    $user = $pendaftar->user;
    $user->noHp = $request->noHp;
    $user->jenKel = $request->input('user_jenKel');
    $user->save();

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

    public function updateStatus(Request $request, $id)
    {
        // Find the Pendaftar record
        $pendaftar = Pendaftar::find($id);

        if (!$pendaftar) {
            // Handle the case when the Pendaftar record is not found
            abort(404);
        }

        // Update the status
        $pendaftar->status = $request->input('status');
        $pendaftar->save();

        // Redirect back or do any other desired action
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function print(){
        $pendaftar = Pendaftar::all();
        $pdf = PDF::loadview('admin.print',['pendaftar'=>$pendaftar]);
        return $pdf->stream();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\CheckLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLevel = Auth::user()->level;

        // Memeriksa level pengguna dan pilihan tabel yang dipilih
        if ($userLevel === 'admin') {
            $pengumumans = Pengumuman::all(); // Mengambil 5 isi tabel
            return view('admin.pengumuman', compact('pengumumans'));
        } elseif ($userLevel === 'panitia') {
            $pengumumans = Pengumuman::all(); // Mengambil 5 isi tabel
            return view('panitia.pengumuman', compact('pengumumans'));
        } else {
            return redirect('/');
        }

        return view(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName =
            date('YmdHis') . '.' . $request->gambar_pengumuman->extension();
        $request->gambar_pengumuman->storeAs('public/pengumuman', $fileName);

        Pengumuman::create([
            'tgl_pengumuman' => $request->tgl_pengumuman,
            'judul_pengumuman' => $request->judul_pengumuman,
            'desc_pengumuman' => $request->desc_pengumuman,
            'gambar_pengumuman' => $fileName,
        ]);
        return redirect()
            ->route('admin.pengumuman')
            ->with('success', 'Pengumuman berhasil ditambahakan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengumumans = Pengumuman::find($id);

        $fileName = '';

        if ($request->hasFile('gambar_pengumuman')) {
            $fileName =
                date('YmdHis') . '.' . $request->gambar_pengumuman->extension();
            $request->gambar_pengumuman
                ->storeAs('public/pengumuman', $fileName);
            Storage::delete('public/pengumuman/' . $pengumumans->gambar_pengumuman);
            $pengumumans->delete();
        } else {
            $fileName = $pengumumans->gambar_pengumuman;
        }

        $pengumumans->tgl_pengumuman = $request->tgl_pengumuman;
        $pengumumans->judul_pengumuman = $request->judul_pengumuman;
        $pengumumans->desc_pengumuman = $request->desc_pengumuman;
        $pengumumans->gambar_pengumuman = $fileName;
        $pengumumans->save();

        return redirect()
            ->route('admin.pengumuman')
            ->with('success', 'Pengumuman berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pengumuman::find($id);
        Storage::delete('public/pengumuman/' . $data->gambar_pengumuman);
        $data->delete();

        return redirect()->route('admin.pengumuman')->with(
            'success',
            'Data Pengumuman Berhasil Dihapus'
        );
    }
}

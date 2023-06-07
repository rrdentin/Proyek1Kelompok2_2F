<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumumans = Pengumuman::all(); // Mengambil 5 isi tabel
        return view('admin.pengumuman', compact('pengumumans'));
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
        if ($request->file('gambar_pengumuman')){
            $image_name = $request->file('gambar_pengumuman')->store('images', 'public');
        }

        Pengumuman::create([
            'tgl_pengumuman' => $request->tgl_pengumuman,
            'judul_pengumuman' => $request->judul_pengumuman,
            'desc_pengumuman' => $request->desc_pengumuman,
            'gambar_pengumuman' => $image_name,
        ]);
        return 'Pengumuman berhasil dibuat!';
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

        $pengumumans->tgl_pengumuman = $request->tgl_pengumuman;
        $pengumumans->judul_pengumuman = $request->judul_pengumuman;
        $pengumumans->desc_pengumuman = $request->desc_pengumuman;

        if ($pengumumans->gambar_pengumuman && file_exists(storage_path('app/public/' . $pengumumans->gambar_pengumuman))) {
            Storage::delete('public/' . $pengumumans->gambar_pengumuman);
    }
    $image_name = $request->file('gambar_pengumuman')->store('images', 'public');
    $pengumumans->gambar_pengumuman = $image_name;

    $pengumumans->save();
    return 'Pengumuman berhasil diubah!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        Pengumuman::find($id)->delete();
        return redirect()->route('admin.pengumuman')->with('success', 'Pengumuman berhasil dihapus!');
    }
}

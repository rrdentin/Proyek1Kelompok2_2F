<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all(); // Mengambil 5 isi tabel
        return view('admin.gallery', compact('gallery'));
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
        $fileName = date('YmdHis') . '.' . $request->gambar_galeri->extension();
        $request->gambar_galeri->storeAs('public/gallery', $fileName);

        Gallery::create([
            'kategori_galeri' => $request->kategori_galeri,
            'keterangan_galeri' => $request->keterangan_galeri,
            'gambar_galeri' => $fileName,
        ]);
        return redirect()->route('admin.gallery')->with('success', 'Galeri berhasil ditambahakan!');
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
        $gallery = Gallery::find($id);

        $fileName = '';

        if ($request->hasFile('gambar_galeri')) {
            $fileName = date('YmdHis') . '.' . $request->gambar_galeri->extension();
            $request->gambar_galeri->storeAs('public/gallery', $fileName);
            if ($gallery->gambar_galeri) {
            Storage::delete('public/gallery' . $gallery->gambar_galeri);
            }
        } else {
            $fileName = $gallery->gambar_galeri;
        }

        $gallery->kategori_galeri = $request->kategori_galeri;
        $gallery->keterangan_galeri = $request->keterangan_galeri;
        $gallery->gambar_galeri = $fileName;
        $gallery->save();

        return redirect()->route('admin.gallery')->with('success', 'Galeri berhasil diubah!');
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
        Gallery::find($id)->delete();
        return redirect()->route('admin.gallery')->with('success', 'Galeri berhasil dihapus!');
    }
}

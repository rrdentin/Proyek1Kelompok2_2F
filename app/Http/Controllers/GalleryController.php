<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\CheckLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GalleryController extends Controller
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
            $gallery = Gallery::all(); // Mengambil 5 isi tabel
            return view('admin.gallery', compact('gallery'));
        } elseif ($userLevel === 'panitia') {
            $gallery = Gallery::all(); // Mengambil 5 isi tabel
            return view('panitia.gallery', compact('gallery'));
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
            date('YmdHis') . '.' . $request->gambar_galeri->extension();
        $request->gambar_galeri->storeAs('public/gallery', $fileName);

        Gallery::create([
            'kategori_galeri' => $request->kategori_galeri,
            'keterangan_galeri' => $request->keterangan_galeri,
            'gambar_galeri' => $fileName,
        ]);
        return redirect()->back()->with('success', 'Gallery Berhasil Ditambahakan!');
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
            $fileName =
                date('YmdHis') . '.' . $request->gambar_galeri->extension();
            $request->gambar_galeri
                ->storeAs('public/gallery', $fileName);
            Storage::delete('public/gallery/' . $gallery->gambar_galeri);
            $gallery->delete();
        } else {
            $fileName = $gallery->gambar_galeri;
        }

        $gallery->kategori_galeri = $request->kategori_galeri;
        $gallery->keterangan_galeri = $request->keterangan_galeri;
        $gallery->gambar_galeri = $fileName;
        $gallery->save();

        return redirect()->back()->with('success', 'Gallery Berhasil Diupdate!');
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
        $data = Gallery::find($id);
        Storage::delete('public/gallery/' . $data->gambar_galeri);
        $data->delete();

        return redirect()->back()->with('success', 'Gallery Berhasil Dihapus!');
    }
}

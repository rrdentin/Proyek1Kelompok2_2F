<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use App\Http\Middleware\CheckLevel;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userLevel = Auth::user()->level;
        $selectedTable = $request->query('table'); // Mengambil nilai query parameter 'table'

        $users = null;
        $view = null;

        // Memeriksa level pengguna dan pilihan tabel yang dipilih
        if ($userLevel === 'admin') {
            if ($selectedTable === 'admin') {
                $users = User::where('level', 'admin')->get();
                $view = 'admin.admintable';
            } elseif ($selectedTable === 'user') {
                $users = User::where('level', 'user')->get();
                $view = 'admin.usertable';
            } elseif ($selectedTable === 'panitia') {
                $users = User::where('level', 'panitia')->get();
                $view = 'panitia-table';
            } else {
                // Pengguna level admin tetapi tidak ada pilihan tabel yang dipilih
                return redirect()->route('table', ['table' => 'admin']);
            }
        } elseif ($userLevel === 'panitia') {
            if ($selectedTable === 'user') {
                $users = User::where('level', 'user')->get();
                $view = 'user-table';
            } elseif ($selectedTable === 'panitia') {
                $users = User::where('level', 'panitia')->get();
                $view = 'panitia-table';
            } else {
                // Pengguna level panitia tetapi tidak ada pilihan tabel yang dipilih
                return redirect()->route('table', ['table' => 'user']);
            }
        } else {
            return redirect('/');
        }

        return view($view, compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
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
        $user = User::find($id);
        return view('admin.edit', compact('user'));
        //
    }

    /**
     * Update the specified resource in storage.
     *

     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'level' => '',

        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        User::find($id)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('admin.admintable')->with('success', 'Berhasil Diupdate');
    }
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        User::find($id)->delete();
        return redirect()->route('admin.admintable')->with('success', 'Berhasil Dihapus');
    }

}

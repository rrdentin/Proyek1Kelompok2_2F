<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use App\Http\Middleware\CheckLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
    $selectedTable = $request->query('table');

    if ($userLevel === 'admin') {
        if ($selectedTable === 'admin') {
            $users = User::where('level', 'admin')->paginate(5)->withQueryString();
            $view = 'admin.admintable';
        } elseif ($selectedTable === 'user') {
            $users = User::where('level', 'user')->paginate(5)->withQueryString();
            $view = 'admin.usertable';
        } elseif ($selectedTable === 'panitia') {
            $users = User::where('level', 'panitia')->paginate(5)->withQueryString();
            $view = 'admin.panitia-table';
        } else {
            return redirect()->route('table', ['table' => 'admin']);
        }
    } elseif ($userLevel === 'panitia') {
        if ($selectedTable === 'user') {
            $users = User::where('level', 'user')->paginate(5)->withQueryString();
            $view = 'panitia.usertable';
        } elseif ($selectedTable === 'panitia') {
            $users = User::where('level', 'panitia')->paginate(5)->withQueryString();
            $view = 'panitia.panitiatable';
        } else {
            return redirect()->route('table', ['table' => 'panitia']);
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
        $user = User::all(); //mendapatkan data dari tabel kelas
        // return view('mahasiswas.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user with the provided data and set the level as 'request'
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        $user->save();

        // Redirect the user to a desired location after saving to the database
        return redirect()->back()->with('success', 'Admin Berhasil Ditambahakan!');
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
        return redirect()->back()->with('success', 'Admin Berhasil Diupdate!');
    }
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        User::find($id)->delete();
        return redirect()->back()->with('success', 'Admin Berhasil Dihapus!');
    }
}

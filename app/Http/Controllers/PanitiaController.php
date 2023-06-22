<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Panitia;
use App\Models\Siswa;
use App\Models\Pendaftar;
use App\Models\Pembayaran;
use App\Http\Middleware\CheckLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class PanitiaController extends Controller
{
    public function index(Request $request)
    {
        $userLevel = Auth::user()->level;
        $selectedTable = $request->query('table'); // Mengambil nilai query parameter 'table'


        // Memeriksa level pengguna dan pilihan tabel yang dipilih
        if ($userLevel === 'panitia') {
            if ($selectedTable === 'user') {
                $users = User::where('level', 'user')->paginate(5);
                $view = 'panitia.usertable';
            } elseif ($selectedTable === 'panitia') {
                $users = User::where('level', 'panitia')->paginate(5);
                $view = 'panitia.panitiatable';
            } else {
                // Pengguna level panitia tetapi tidak ada pilihan tabel yang dipilih
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
        return redirect()->back()->with('success', 'Panitia Berhasil Ditambahakan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Panitia $panitia)
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
        return view('panitia.edit', compact('user'));
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
        return redirect()->back()->with('success', 'Panitia Berhasil Diupdate!');
    }
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        User::find($id)->delete();
        return redirect()->back()->with('success', 'Panitia Berhasil Dihapus!');
    }

    public function searchPUser(Request $request)
    {

        $request->has('search');
        $level = Auth::user()->level;
        $view = 'panitia.usertable';

        if ($level === 'user') {
            $users = User::where('level', 'user')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(5)->withQueryString();
        } else {
            $users = User::where('level', 'user')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(5)->withQueryString();
        }

        return view($view, ['users' => $users])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function searchPPanitia(Request $request)
    {

        $request->has('search');
        $level = Auth::user()->level;
        $view = 'panitia.panitiatable';

        if ($level === 'panitia') {
            $users = User::where('level', 'panitia')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(5)->withQueryString();
        } else {
            $users = User::where('level', 'panitia')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(5)->withQueryString();
        }

        return view($view, ['users' => $users]);
    }

    public function searchPPendaftar(Request $request)
    {
        $request->has('search');
        $level = Auth::user()->level;
        $view = 'panitia.pendaftar';

        if ($level === 'panitia') {
            $pendaftars = Pendaftar::with('pembayaran')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(5)->withQueryString();
        } else {
            $pendaftars = Pendaftar::with('pembayaran')->where('name', 'LIKE', '%' . $request->search . '%')->paginate(5)->withQueryString();
        }

        $pembayaran = [];
        if ($pendaftars->isNotEmpty()) {
            $pembayaran = Pembayaran::whereIn('pendaftar_id', $pendaftars->pluck('id'))->paginate(5)->withQueryString();
        }

        return view('panitia.pendaftar', compact('pendaftars', 'pembayaran'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function searchPSiswa(Request $request)
    {
        $keyword = $request->search;
        $siswas = Siswa::where('nis', 'like', '%' . $request->search . '%')->paginate(5)->withQueryString();
        return view('panitia.siswa', compact('siswas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function searchPPembayaran(Request $request)
    {
        $keyword = $request->search;
        $pembayarans = Pembayaran::where('id', 'like', '%' . $request->search . '%')->paginate(5)->withQueryString();
        return view('panitia.pembayaran', compact('pembayarans'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{


    public function dashboard(Request $request)
{
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
        $pendaftars = Pendaftar::where('user_id', $user->id)->get();
        $pembayarans = [];

        if ($pendaftars->isNotEmpty()) {
            $pendaftarIds = $pendaftars->pluck('id')->toArray();
            $pembayarans = Pembayaran::whereIn('pendaftar_id', $pendaftarIds)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }

        return view('user.dashboard.pembayaran', compact('pembayarans'));
    }

    // Handle other levels or no level assigned
    return redirect()->back()->with('error', 'Unauthorized access.');
}

    public function show($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit($id)
{
    $pembayaran = Pembayaran::findOrFail($id);

    if ($pembayaran->status !== 'invalid' && $pembayaran->status !== 'bayar') {
        return redirect()->back()->with('error', 'Hanya pembayaran dengan status "invalid" yang dapat diunggah ulang berkas.');
    }

    return view('pembayaran.edit', compact('pembayaran'));
}
public function update(Request $request, $id)
{
    $user = Auth::user();
    $pembayaran = Pembayaran::findOrFail($id);

    if ($user->level == 'user') {
        if ($pembayaran->status !== 'invalid' && $pembayaran->status !== 'bayar') {
            return redirect()->back()->with('error', 'Hanya pembayaran dengan status "invalid" yang dapat diunggah ulang berkas.');
        }

        $validator = Validator::make($request->all(), [
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image_name = $request->file('bukti_pembayaran')->store('images', 'public');

        $pembayaran->bukti_pembayaran = $image_name;
        $pembayaran->status = 'verifikasi'; // Set the status to 'verifikasi' if it was previously 'bayar' or 'invalid'
    } else if ($user->level == 'admin' || $user->level == 'panitia') {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pembayaran->status = $request->status;
    }

    $pembayaran->save();

    return redirect()->route('pembayaran.dashboard')->with('success', 'Berkas pembayaran berhasil diunggah ulang.');
}

    public function print($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Proses cetak pembayaran

        return view('pembayaran.print', compact('pembayaran'));
    }
}
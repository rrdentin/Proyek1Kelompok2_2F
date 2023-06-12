@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pendaftaran Dashboard</h1>

        <div class="mb-3">
            <a href="{{ route('pendaftar.create') }}" class="btn btn-primary">Tambah Calon Siswa</a>
        </div>

        @if (is_array($pendaftars) && count($pendaftars) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenjang Pendidikan</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pembayarans as $pembayaran)
    <tr>
        <td>{{ $pendaftars[0]->name }}</td>
        <td>{{ $pendaftars[0]->name_wali }}</td>
        <td>{{ $pembayaran->jenjangPend }}</td>
        <td>{{ $pembayaran->jumlah }}</td>
        <td>{{ $pembayaran->status }}</td>
        <td>
            @if ($pembayaran->status == 'bayar')
                <a href="{{ route('pembayaran.create' }}" class="btn btn-primary">Upload</a>
            @elseif ($pembayaran->status == 'invalid')
                <a href="{{ route('pembayaran.update', $pembayaran->id) }}" class="btn btn-warning">Update</a>
            @elseif ($pembayaran->status == 'pending')
                <a href="{{ route('pembayaran.show', $pembayaran->id) }}" class="btn btn-primary">Show</a>
            @elseif ($pembayaran->status == 'terbayar')
                <a href="{{ route('pembayaran.show', $pembayaran->id) }}" class="btn btn-primary">Show</a>
                <a href="{{ route('pembayaran.print', $pembayaran->id) }}" class="btn btn-success">Print</a>
            @endif
        </td>
    </tr>
@endforeach
                </tbody>
            </table>
        @else
            <p>Belum ada pendaftaran.</p>
        @endif
    </div>
@endsection
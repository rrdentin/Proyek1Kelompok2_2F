@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pendaftaran Dashboard</h1>

    <div class="mb-3">
        <a href="{{ route('pendaftar.create') }}" class="btn btn-primary">Tambah Calon Siswa</a>
    </div>

    @if ($pendaftars->count() > 0)
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
            @foreach ($pendaftars as $pendaftar)
            <tr>
                <td>{{ $pendaftar->name }}</td>
                <td>{{ $pendaftar->jenjangPend }}</td>
                <td>
                    @if ($pendaftar->pembayaran->isNotEmpty())
                    @foreach ($pendaftar->pembayaran as $pembayaran)
                    @if ($pembayaran->status == 'bayar' || $pembayaran->status == 'invalid')
                    <a href="{{ route('pembayaran.dashboard') }}">Bayar</a>
                    @else
                    {{ $pembayaran->status }}
                    @endif
                    @endforeach
                    @endif
                </td>

                <td>
                    @if ($pendaftar->status == 'accepted')
                    <a href="{{ route('siswa.show', $pendaftar->id) }}">{{ $pendaftar->status }}</a>
                    @else
                    {{ $pendaftar->status }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('pendaftar.show', $pendaftar->id) }}">Lihat</a>
                    @if ($pendaftar->status == 'pending')
                    <a href="{{ route('pendaftar.edit', $pendaftar->id) }}">Edit</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Tidak ada pendaftar yang tersedia.</p>
    @endif
</div>
@endsection

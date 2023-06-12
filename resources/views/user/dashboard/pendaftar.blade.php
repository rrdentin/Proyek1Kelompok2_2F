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
            @foreach ($pendaftars as $pendaftarArray)
                @foreach ($pendaftarArray as $pendaftar)
                    <tr>
                        <td>{{ $pendaftar->name }}</td>
                        <td>{{ $pendaftar->jenjangPend }}</td>
                        <td>
                            @if ($pendaftar->pembayaran)
                                @if ($pendaftar->pembayaran->status == 'bayar' || $pendaftar->pembayaran->status == 'invalid')
                                    <a href="{{ route('pembayaran.show', $pendaftar->pembayaran->id) }}">Bayar</a>
                                @else
                                    {{ $pendaftar->pembayaran->status }}
                                @endif
                            @else
                                Belum Ada Pembayaran
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
            @endforeach
        </tbody>
    </table>
@else
    <p>Belum ada pendaftaran.</p>
@endif
@endsection
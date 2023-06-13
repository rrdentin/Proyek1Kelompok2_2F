@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard - Pendaftaran</h1>
        <hr>

        @if (count($pendaftars) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Nama Wali</th>
                        <th>Jenjang Pendidikan</th>
                        <th>Pembayaran</th>
                        <th>Status</th>
                        <th>Ubah Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftars as $pendaftar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pendaftar->name }}</td>
                            <td>{{ $pendaftar->name_wali }}</td>
                            <td>{{ $pendaftar->jenjangPend }}</td>
                            <td>{{ $pendaftar->pembayaran->status ?? 'Belum Ada' }}</td>
                            <td>{{ $pendaftar->status }}</td>
                            <td>
                                <form action="{{ route('pendaftar.updateStatus', $pendaftar->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="pending" {{ $pendaftar->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="accepted" {{ $pendaftar->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                        <option value="rejected" {{ $pendaftar->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('pendaftar.show', $pendaftar->id) }}" class="btn btn-primary">Lihat</a>
                                <a href="{{ route('pendaftar.edit', $pendaftar->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('pendaftar.delete', $pendaftar->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pendaftar ini?')">Delete</button>
                                </form>
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
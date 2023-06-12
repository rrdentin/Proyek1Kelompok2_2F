@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pembayaran Dashboard</h1>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Name Wali</th>
                        <th>Jenjang Pendidikan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayarans as $pembayaran)
                    <tr>
                        <td>{{ $pendaftars[0]->name }}</td>
                        <td>{{ $pendaftars[0]->name_wali }}</td>
                        <td>{{ $pendaftars[0]->jenjangPend }}</td>
                        <td>{{ $pembayaran->jumlah }}</td>
                        <td>{{ $pembayaran->status }}</td>
                        <td>
                            @if ($pembayaran->status == 'bayar')
                            <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-primary">Upload</a>
                            @elseif ($pembayaran->status == 'invalid')
                            <a href="{{ route('pembayaran.update', $pembayaran->id) }}"
                                class="btn btn-warning">Update</a>
                            @elseif ($pembayaran->status == 'verifikasi')
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

            {{ $pembayarans->links() }}
        </div>
    </div>
</div>
@endsection

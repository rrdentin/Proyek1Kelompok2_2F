@extends('layouts.app')

@section('content')
    <h1>Pembayaran Detail</h1>

    <table>
        <tr>
            <th>Name</th>
            <td>{{ $pembayaran->name }}</td>
        </tr>
        <tr>
            <th>Name Wali</th>
            <td>{{ $pembayaran->name_wali }}</td>
        </tr>
        <tr>
            <th>Jenjang Pendidikan</th>
            <td>{{ $pembayaran->jenjangPend }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $pembayaran->jumlah }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $pembayaran->status }}</td>
        </tr>
    </table>

    <a href="{{ route('pembayaran.print', $pembayaran->id) }}">Print</a>
@endsection
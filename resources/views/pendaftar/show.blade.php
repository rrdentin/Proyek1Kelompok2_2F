@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Pendaftar</h1>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <h4>Data Pendaftar</h4>
                <p><strong>Nama:</strong> {{ $pendaftar->name }}</p>
                <p><strong>Tempat Lahir:</strong> {{ $pendaftar->tempatLahir }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $pendaftar->tglLahir }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $pendaftar->jenKel }}</p>
                <p><strong>Alamat:</strong> {{ $pendaftar->alamat }}</p>
                <p><strong>Jenjang Pendidikan:</strong> {{ $pendaftar->jenjangPend }}</p>
            </div>
            <div class="col-md-6">
                <h4>Data Wali</h4>
                <p><strong>Nama Wali:</strong> {{ $pendaftar->name_wali }}</p>
                <p><strong>Email:</strong> {{ $pendaftar->user->email }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $pendaftar->user->jenKel }}</p>
                <p><strong>Nomor HP:</strong> {{ $pendaftar->user->noHp }}</p>


            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <h4>File Pendukung</h4>
                <p><strong>Foto:</strong></p>
                <img src="{{ asset('storage/' . $pendaftar->foto) }}" alt="Foto Pendaftar">

                <p><strong>Akte Kelahiran:</strong></p>
                <img src="{{ asset('storage/' . $pendaftar->akte) }}" alt="Akte Kelahiran">

                <p><strong>Kartu Keluarga:</strong></p>
                <img src="{{ asset('storage/' . $pendaftar->kk) }}" alt="Kartu Keluarga">
            </div>
        </div>
    </div>
@endsection
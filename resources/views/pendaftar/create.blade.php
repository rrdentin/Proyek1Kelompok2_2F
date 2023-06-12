@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Calon Siswa</h1>

    <form action="{{ route('pendaftar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="jenjangPend" class="form-label">Jenjang Pendidikan</label>
            <select class="form-control" id="jenjangPend" name="jenjangPend" required>
                <option value="TK">TK</option>
                <option value="Paud">Paud</option>
            </select><input type="hidden" name="user_id" value="{{ $user->id }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat"></textarea>
        </div>

        <div class="mb-3">
            <label for="tglLahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tglLahir" name="tglLahir" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
        </div>

        <div class="mb-3">
            <label for="kk" class="form-label">KK</label>
            <input type="file" class="form-control" id="kk" name="kk">
        </div>

        <div class="mb-3">
            <label for="akte" class="form-label">Akte</label>
            <input type="file" class="form-control" id="akte" name="akte">
        </div>

        <hr>

        <div class="mb-3">
            <label for="name_wali" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name_wali" name="name_wali" value="{{ Auth::user()->name }}"
                required>
        </div>

        <div class="mb-3">
            <label for="noHp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="noHp" name="noHp" value="{{ Auth::user()->noHp }}" required>
        </div>

        <div class="mb-3">
            <label for="user_jenKel" class="form-label">Jenis Kelamin (User)</label>
            <select class="form-control" id="user_jenKel" name="user_jenKel">
                <option value="Perempuan" {{ Auth::user()->jenKel === 'Perempuan' ? 'selected' : '' }}>Perempuan
                </option>
                <option value="Laki-laki" {{ Auth::user()->jenKel === 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
        </div>

        <div class="mb-3">
            <label for="tempatLahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" required>
        </div>


        <div class="mb-3">
            <label for="pendaftar_jenKel" class="form-label">Jenis Kelamin (Pendaftar)</label>
            <select class="form-control" id="pendaftar_jenKel" name="pendaftar_jenKel" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

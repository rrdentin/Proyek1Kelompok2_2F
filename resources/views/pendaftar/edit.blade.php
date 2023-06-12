@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Pendaftar</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('pendaftar.update', $pendaftar->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
    <label for="jenjangPend">Jenjang Pendidikan</label>
    <input type="hidden" name="jenjangPend" value="{{ $pendaftar->jenjangPend }}">
</div>
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pendaftar->name) }}" required>
                            </div>

                            <!-- Name Wali -->
                            <div class="form-group">
                                <label for="name_wali">Name Wali</label>
                                <input type="text" class="form-control" id="name_wali" name="name_wali" value="{{ old('name_wali', $pendaftar->name_wali) }}" required>
                            </div>

                            <!-- Jenis Kelamin Pendaftar -->
                            <div class="form-group">
                                <label for="pendaftar_jenKel">Jenis Kelamin Pendaftar</label>
                                <select class="form-control" id="pendaftar_jenKel" name="pendaftar_jenKel" required>
                                    <option value="Laki-laki" {{ old('pendaftar_jenKel', $pendaftar->jenKel) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('pendaftar_jenKel', $pendaftar->jenKel) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <!-- Alamat -->
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $pendaftar->alamat) }}</textarea>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="form-group">
                                <label for="tglLahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tglLahir" name="tglLahir" value="{{ old('tglLahir', $pendaftar->tglLahir) }}" required>
                            </div>

                            <!-- Foto -->
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control-file" id="foto" name="foto">
                                <small class="form-text text-muted">Max file size: 2MB</small>
                            </div>

                            <!-- Akte -->
                            <div class="form-group">
                                <label for="akte">Akte</label>
                                <input type="file" class="form-control-file" id="akte" name="akte">
                                <small class="form-text text-muted">Max file size: 2MB</small>
                            </div>

                            <!-- KK -->
                            <div class="form-group">
                                <label for="kk">KK</label>
                                <input type="file" class="form-control-file" id="kk" name="kk">
                                <small class="form-text text-muted">Max file size: 2MB</small>
                            </div>

                            <!-- No HP -->
                            <div class="form-group">
                                <label for="noHp">No HP</label>
                                <input type="text" class="form-control" id="noHp" name="noHp" value="{{ old('noHp', $pendaftar->user->noHp) }}" required>
                            </div>

                            <!-- Nik -->
<div class="form-group">
    <label for="nik">NIK</label>
    <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $pendaftar->nik) }}" required>
</div>

<!-- Tempat Lahir -->
<div class="form-group">
    <label for="tempatLahir">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="{{ old('tempatLahir', $pendaftar->tempatLahir) }}" required>
</div>

                            <!-- Jenis Kelamin User -->
                            <div class="form-group">
                                <label for="user_jenKel">Jenis Kelamin User</label>
                                <select class="form-control" id="user_jenKel" name="user_jenKel" required>
                                    <option value="Laki-laki" {{ old('jenKel', $pendaftar->user->jenKel) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenKel', $pendaftar->user->jenKel) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Form Edit
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('users.update', $user->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" 
                            id="username" value="{{ $user->username }}" ariadescribedby="username" >
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" 
                            id="name" value="{{ $user->name }}" ariadescribedby="name" >
                    </div>
                    <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" 
                                id="email" value="{{ $user->email }}" ariadescribedby="email" >
                    </div>
                    {{-- <div class="form-group">
                        <label for="Tanggal_Lahir">Tanggal Lahir</label>
                        <input type="text" name="Tanggal_Lahir" class="form-control" 
                            id="Tanggal_Lahir" value="{{ $Mahasiswa->Tanggal_Lahir }}" ariadescribedby="Tanggal_Lahir" >
                    </div>
                    <div class="form-group">
                        <label for="Kelas">Kelas</label>
                        <input type="Kelas" name="Kelas" class="form-control" 
                            id="Kelas" value="{{ $Mahasiswa->Kelas }}" ariadescribedby="Kelas" >
                    </div>
                    <div class="form-group">
                        <label for="Jurusan">Jurusan</label>
                        <input type="Jurusan" name="Jurusan" class="form-control"
                            id="Jurusan" value="{{ $Mahasiswa->Jurusan }}" ariadescribedby="Jurusan" >
                    </div>
                    <div class="form-group">
                        <label for="No_Handphone">No_Handphone</label>
                        <input type="No_Handphone" name="No_Handphone" class="form-control" 
                            id="No_Handphone" value="{{ $Mahasiswa->No_Handphone }}" ariadescribedby="No_Handphone" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
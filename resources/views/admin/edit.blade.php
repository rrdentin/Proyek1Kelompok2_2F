@extends('layouts.adminedit')

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
                    <div class="modal-body">
                        <form method="post" action="{{ route('users.update', $user->id) }}" id="myForm">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input class="form-control form-control-sm" name="username" type="text" required
                                    id="username" value="{{ $user->username }}" ariadescribedby="username">
                                <label for="name">Nama:</label>
                                <input class="form-control form-control-sm" name="name" type="text" id="name"
                                    value="{{ $user->name }}" ariadescribedby="name" required>
                                <label for="email">Email:</label>
                                <input class="form-control form-control-sm" name="email" type="email" id="email"
                                    value="{{ $user->email }}" ariadescribedby="email" required>
                                <label for="level">Level:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" @checked($user->level == 'admin')
                                        name="level" id="option1" value="admin" ariadescribedby="admin" required>
                                    <label class="form-check-label" for="admin">
                                        Admin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" @checked($user->level == 'panitia')
                                        name="level" id="option2" value="panitia" ariadescribedby="user" required>
                                    <label class="form-check-label" for="panitia">
                                        Panitia
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" @checked($user->level == 'user')
                                        name="level" id="option3" value="user" ariadescribedby="user" required>
                                    <label class="form-check-label" for="user">
                                        User
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

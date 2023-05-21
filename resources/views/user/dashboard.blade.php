@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>Welcome, {{ Auth::user()->name }}!</p>

                        <table class="table table-responsive">
                            <tr>
                                <th>Username</th>
                                <th>:</th>
                                <td>{{ Auth::user()->username }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>:</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <th>:</th>
                                <td>{{ Auth::user()->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
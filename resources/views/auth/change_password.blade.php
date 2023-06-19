@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Change Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.change') }}">
                            @csrf

                            <!-- Current Password Input -->
                            <div class="form-group">
                                <label for="current_password">{{ __('Current Password') }}</label>
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- New Password Input -->
                            <div class="form-group">
                                <label for="new_password">{{ __('New Password') }}</label>
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Confirm New Password Input -->
                            <div class="form-group">
                                <label for="new_password_confirmation">{{ __('Confirm New Password') }}</label>
                                <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                            </div>

                            <!-- Change Password Button -->
                            <div class="container">
                                <div class="d-flex align-items-center" style="height: 50px">
                                <div class="col-md-10">
                                    <a href="/user/landing" class="btn btn-primary btn-icon">
                                        <i class="fas fa-arrow-left"></i>
                                        Kembali
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
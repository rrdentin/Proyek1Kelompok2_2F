@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Pembayaran') }}</div>

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

                        <form method="POST" action="{{ route('pembayaran.update', $pembayaran->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input id="pendaftar_id" type="hidden" class="form-control" name="pendaftar_id"
                                value="{{ old('pendaftar_id', $pembayaran->pendaftar_id) }}" required autofocus>

                            <div class="form-group">


                            </div>

                            <div class="form-group">
                                <label for="bukti_pembayaran">{{ __('Bukti Pembayaran') }}</label>
                                <input id="bukti_pembayaran" type="file" class="form-control" name="bukti_pembayaran"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

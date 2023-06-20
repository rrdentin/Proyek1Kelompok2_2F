@extends('auth.layoutsregis')

@section('content')


    <title>Reset Password | Shaleh</title>
    </head>

    <body>

        <div class="d-lg-flex half">
            <div class="bg order-1 order-md-2" style="background-image: url('masuk/images/anak1.png');"></div>
            <div class="contents order-2 order-md-1">

                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7">
                            <div class="mb-2">
                                <h3>Reset Password</h3>
                                <br>
                            </div>
                            <form action="{{ route('password.reset') }}" method="post">
                                @csrf
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        style="font-size: 12px" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <input name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" form-control-user"
                                        id="password" placeholder="Password" style="font-size: 12px">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Konfirmasi Password" required
                                        autocomplete="new-password" style="font-size: 12px">
                                </div>
                                <br>
                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Saya setuju untuk
                                            mereset password</span>
                                        <input type="checkbox" checked="checked" required />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>

                                <input type="submit" value="Reset Password" class="btn btn-block btn-primary"
                                    style="margin-top: -30px;">
                                </a>
                                <br>
                                <p>Back to <a href="{{ route('login') }}" class="regis"> <span>Login</span> </a></p>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="masuk/js/jquery-3.3.1.min.js"></script>
        <script src="masuk/js/popper.min.js"></script>
        <script src="masuk/js/bootstrap.min.js"></script>
        <script src="masuk/js/main.js"></script>
    </body>

    </html>

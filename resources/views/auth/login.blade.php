@extends('auth.layoutsregis')
@section('content')

<title>Login | Shaleh</title>
</head>

<body>

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-1" style="background-image: url('masuk/images/anak1.png');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-2">
                            <h3>Login</h3>
                            <p></p>

                            <img class="images">
                            {{-- facebook --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                            {{-- google --}}
                            <a href="{{ url('auth/google') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi-google" viewBox="0 0 16 16">
                                <path
                                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                            </svg></a>
                            </img>
                            <br><br>
                            <p class="mb-4">Selamat Datang silahkan Login</p>
                        </div>
                        <div class="card-body">
                        
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" aria-describedby="emailHelp" required autocomplete="email" value="{{ old('email') }}"
                                placeholder="Email" autofocus style="font-size: 12px">
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
                                    id="password" required autocomplete="current-password" placeholder="Password" style="font-size: 12px">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <br>

                            <!-- Remember Me Checkbox -->
                            <label for="remember">
                                <input id="remember" type="checkbox" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                Remember me
                            </label>

                            <input type="submit" value="Login" class="btn btn-block btn-primary">
                            </a>
                            <br>
                            <a href="{{ route('register') }}" class="regis" style="margin-left: 40%"> <span>Register</span> </a>
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

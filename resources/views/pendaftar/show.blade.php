@extends('layouts.userapp')
<title>Daftar Siswa | Shaleh </title>
<link rel="icon" href="{{ asset('dist/img/Logo Shaleh.png') }}">

<body id="top-page">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('/') }}dist/img/Logo Shaleh.png" alt="AdminLTELogo" height="170"
            width="195">
    </div>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-dark navbar-light">
            <img src="{{ asset('dist/img/Logo Shaleh.png') }}" height="40" width="45" style="margin-right: 10px"
                alt="AdminLTELogo">
            <h1 style="color: #fbfafa">Detail Pendaftar</h1>

            <!-- Right navbar links -->
            <div class="main-header navbar navbar-expand navbar-dark navbar-light" style="margin-left: 70%">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                            {{ Auth::user()->username }}
                        </a>
                        <div id="dropdownMenu" class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('user.profile') }}">View Profile</a>
                            <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->
        <div class="row justify-content-center" style="margin-right: 5%">
            <section class="content">
                <div class="container">

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
                        <div class="col-md-3">
                            <h4>File Pendukung</h4>
                            <p><strong>Foto:</strong></p>
                            <img style="image-resolution: 100%" src="{{ asset('storage/' . $pendaftar->foto) }}"
                                height="25%" width="75%" alt="Foto Pendaftar">
                            <br><br>
                            <p><strong>Akte Kelahiran:</strong></p>
                            <img src="{{ asset('storage/' . $pendaftar->akte) }}" height="25%" width="75%"
                                alt="Akte Kelahiran">
                            <br><br>
                            <p><strong>Kartu Keluarga:</strong></p>
                            <img src="{{ asset('storage/' . $pendaftar->kk) }}" height="25%" width="75%"
                                alt="Kartu Keluarga">
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

    @extends('admin.footer')
    <!-- /.control-sidebar -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('/') }}dist/js/adminlte.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('/') }}plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/') }}dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('/') }}dist/js/pages/dashboard3.js"></script>
</body>

</html>

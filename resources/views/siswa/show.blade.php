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
            <h3 style="color: #fbfafa">Detail Siswa</h3>

            <!-- Right navbar links -->
            <div class="main-header navbar navbar-expand navbar-dark navbar-light" style="margin-left: 70%">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                            {{ Auth::user()->username }}
                        </a>
                        <div id="dropdownMenu" class="dropdown-menu dropdown-menu-right">
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
        <section class="vh-100 d-flex align-items-center" style="background-color: #f4f5f7;">
            <div class="container py-6">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-black"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    @if ($siswa->pendaftar->foto)
                                        <img src="{{ asset('storage/' . $siswa->pendaftar->foto) }}" alt="Foto"
                                            height="50" class="img-fluid mt-5 mb-5 rounded-circle"
                                            style="width: 110px; height: 110px; object-fit: cover; border-radius: 50%;">
                                    @else
                                        No foto available
                                    @endif
                                    <strong><h6>Berikut adalah Nomor Induk Siswa {{ $siswa->pendaftar->name }}</h6></strong>
                                    <td colspan="4"><strong> {{ $siswa->nis }}</strong></td>
                                    <td></td>
                                    <hr>
                                    <td><strong style="font-size: 13; margin-left: -1.9%">Didaftarkan Pada </strong></td>
                                    <td >: {{ $pendaftar->created_at }}</td>
                                    <br>
                                    <td colspan="1"><strong style="font-size: 13; margin-left: -7%">Diupdate Pada</strong></td>
                                    <td>: {{ $pendaftar->updated_at }}</td>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h3>Informasi Siswa</h3>
                                        <hr class="mt-0 mb-1">
                                        <div class="row pt-4">
                                            <div class="col-8 mb-3">
                                                <table width="400px">
                                                    <tr>
                                                        <td><strong>NIK</strong><td>
                                                        <td> : {{ $siswa->pendaftar->nik }}<td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Nama Siswa</strong><td>
                                                        <td>: {{ $siswa->pendaftar->name }}<td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Tempat Lahir</strong><td>
                                                        <td> : {{ $siswa->pendaftar->tempatLahir }}<td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Tanggal Lahir</strong><td>
                                                        <td> : {{ $siswa->pendaftar->tglLahir }}<td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Alamat</strong><td>
                                                        <td> : {{ $siswa->pendaftar->alamat }}<td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Jenjang Pendidikan</strong><td>
                                                        <td> : {{ $siswa->pendaftar->jenjangPend }}<td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Jenis Kelamin</strong><td>
                                                        <td> : {{ $siswa->pendaftar->jenKel }}<td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Status</strong><td>
                                                        <td> : {{ $siswa->pendaftar->status }}<td>
                                                    </tr>                  
                                                </table>    
                                            </div>
                                        
                                        </div>
                                        <br>
                                        <h3>Informasi Wali</h3>
                                        <hr class="mt-0 mb-4">
                                            <table width="200px">
                                                <tr>
                                                    <td><strong>Nama Wali </strong><td>
                                                    <td> : {{ $siswa->pendaftar->name_wali }}<td>
                                                </tr>
                                            </table>
                                            </hr>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>

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

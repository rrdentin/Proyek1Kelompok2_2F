@extends('admin.app')
<title>Siswa | Shaleh </title>
<link rel="icon" href="{{ asset('dist/img/Logo Shaleh.png') }}">
@extends('admin.sidebar')
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('/') }}dist/img/Logo Shaleh.png" alt="Sekolah Saleh Logo" height="170"
            width="195">
    </div>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a class="nav-link" href="{{ route('admin.profile') }}">
                            <th>{{ Auth::user()->name }}</th>
                        </a>
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <div style="margin-left: 250px">
            <section class="content">
                <div class="container-fluid">
                    <h1>Data Siswa </h1>
                    <!-- Small boxes (Stat box) -->
                    <!-- content alvian -->
                    <br>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg">
                                <div class="card">
                                <br>
                                    <div class="card-header border-0">
                                    <h6>Berikut Tabel data siswa Sekolah Saleh yang sudah diseleksi</h6>
                                        <br>
                                        <div class="table-responsive">
                                            @if (!empty($siswas) && count($siswas) > 0)
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIS</th>
                                                            <th>Name</th>
                                                            <th>Foto</th>
                                                            <th>Nama Wali</th>
                                                            <th>Jenjang Pendidikan</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $no = 1;
                                                        @endphp
                                                        @foreach ($siswas as $siswa)
                                                            <tr>
                                                                <td>{{ $siswa->id }}</td>
                                                                <td>{{ $siswa->nis }}</td>
                                                                <td>{{ $siswa->pendaftar->name }}</td>
                                                                <td>
                                                                    @if ($siswa->pendaftar->foto)
                                                                        <img src="{{ asset('storage/' . $siswa->pendaftar->foto) }}"
                                                                            alt="Foto" height="50">
                                                                    @else
                                                                        No foto available
                                                                    @endif
                                                                </td>
                                                                <td>{{ $siswa->pendaftar->name_wali }}</td>
                                                                <td>{{ $siswa->pendaftar->jenjangPend }}</td>
                                                                <td>
                                                                    <a href="{{ route('siswa.show', $siswa->id) }}"
                                                                        class="btn btn-primary">Lihat</a>
                                                                    <a href="{{ route('siswa.print', $siswa->id) }}"
                                                                        class="btn btn-success">Cetak</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="container">
                                                    <div class="d-flex align-items-center" style="height: 50px">
                                                        <div class="col-lg-10">
                                                            <a href="/panitia/dashboard" class="btn btn-primary btn-icon">
                                                                <i class="fas fa-arrow-left"></i>
                                                                Kembali
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-4">
                                                        {{ $siswas->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="alert alert-info" style="border: none;">
                                                    <p>Tidak ada siswa yang tersedia.</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- content ega -->
                            <!-- Main row -->
                            <div class="row">
                                <!-- Left col -->
                                <section class="col-lg-7 connectedSortable">
                                    <!-- Custom tabs (Charts with tabs)-->
                            </div>
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

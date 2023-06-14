@extends('layouts.userapp')
<title>User Dashboard| Shaleh</title>
<link rel="icon" type="image/icon" sizes="32x32" href="/landing/images/LogoShaleh.png">
@extends('layouts.usersidebar')

<body class="hold-transition sidebar-mini">

    <!-- Preloader -->
    
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            <span class="ml-1">{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-caret-down ml-1" viewBox="0 0 16 16">
                                <path
                                    d="M7.646 11.646a.5.5 0 0 1-.707 0L2.146 6.354a.5.5 0 0 1 .708-.708L8 10.293l5.146-5.647a.5.5 0 0 1 .708.708l-5.5 5.5a.5.5 0 0 1-.708 0l-5.5-5.5z" />
                            </svg>
                        </span>
                    </a>


                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('user.profile') }}">View Profile</a>
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

        <!-- Content Wrapper. Contains page content -->
        <div class="wrapper">
            <div class="content-wrapper" style="margin-bottom: -5%;">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">PPBD Manager | Shaleh</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <!-- content alvian -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="d-flex justify-content-between">
                        <a href="{{ route('pendaftar.create') }}" class="btn btn-primary">Tambah Calon Siswa</a>
                    </div>
                    <br>

                    @if ($pendaftars->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenjang Pendidikan</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftars as $pendaftar)
                            <tr>
                                <td>{{ $pendaftar->name }}</td>
                                <td>{{ $pendaftar->jenjangPend }}</td>
                                <td>
                                    @if ($pendaftar->pembayaran->isNotEmpty())
                                    @foreach ($pendaftar->pembayaran as $pembayaran)
                                    @if ($pembayaran->status == 'bayar' || $pembayaran->status == 'invalid')
                                    <a href="{{ route('pembayaran.dashboard') }}">Bayar</a>
                                    @else
                                    {{ $pembayaran->status }}
                                    @endif
                                    @endforeach
                                    @endif
                                </td>

                                <td>
                                    @if ($pendaftar->status == 'accepted')
                                    <a href="{{ route('siswa.show', $pendaftar->id) }}">{{ $pendaftar->status }}</a>
                                    @else
                                    {{ $pendaftar->status }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pendaftar.show', $pendaftar->id) }}">Lihat</a>
                                    @if ($pendaftar->status == 'pending')
                                    <a href="{{ route('pendaftar.edit', $pendaftar->id) }}">Edit</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Tidak ada pendaftar yang tersedia.</p>
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
                    <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- ./wrapper -->

    @extends('admin.footer')

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
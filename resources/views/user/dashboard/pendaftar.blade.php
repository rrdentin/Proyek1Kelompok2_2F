@extends('layouts.userapp')
<title>Daftar Siswa | Shaleh </title>
<link rel="icon" href="{{ asset('dist/img/Logo Shaleh.png') }}">
@extends('layouts.usersidebar')
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
        <img class="animation__shake" src="{{ asset('/') }}dist/img/Logo Shaleh.png" alt="AdminLTELogo" height="170"
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
                        <a class="nav-link" href="{{ route('user.profile') }}">
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
                    <h1>Pendaftaran Dashboard</h1>
                    <!-- Small boxes (Stat box) -->
                    <!-- content alvian -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg">
                                <div class="card">
                                    <div class="container">
                                        <div class="container">
                                            <div class="d-flex align-items-center" style="height: 50px">
                                                <div class="col-md-9">
                                                    <button data-toggle="modal" data-target="#createPendaftar"
                                                        class="btn btn-icon btn-primary"><i
                                                            class="fas fa-user-plus"></i> Tambah Calon Siswa
                                                    </button>
                                                </div>
                                                <div class="col-md-5">
                                                    <form class="form-left my-4" method="get"
                                                        action="{{ route('searchPendaftarUser') }}">
                                                        <div class="form-group w-80 mb-1">
                                                            <input type="text" name="search"
                                                                class="form-control w-50 d-inline" id="search"
                                                                placeholder="Search">
                                                            <button type="submit"
                                                                class="btn btn-primary mb-1">Cari</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    @include('user.create.createPendaftar')
                                    @include('user.edit.editPendaftar')

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    <div class="table table-responsive">
                                        @if ($pendaftars->count() > 0)
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center fonts-big">Nama</th>
                                                        <th class="text-center fonts-big">Jenjang Pendidikan</th>
                                                        <th class="text-center fonts-big">Pembayaran</th>
                                                        <th class="text-center fonts-big">Status</th>
                                                        <th class="text-center fonts-big" colspan="2">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pendaftars as $pendaftar)
                                                        <tr>
                                                            <td>{{ $pendaftar->name }}
                                                            </td>
                                                            <td class="text-center fonts-big">
                                                                {{ $pendaftar->jenjangPend }}</td>
                                                            <td class="text-center fonts-big">
                                                                @if ($pendaftar->pembayaran->isNotEmpty())
                                                                    @foreach ($pendaftar->pembayaran as $pembayaran)
                                                                        @if ($pembayaran->status == 'bayar' || $pembayaran->status == 'invalid')
                                                                            <a class="btn btn-success "
                                                                                href="{{ route('pembayaran.dashboard') }}">Bayar</a>
                                                                        @else
                                                                            {{ $pembayaran->status }}
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td class="text-center fonts-big">
                                                                @if ($pendaftar->status == 'accepted')
                                                                    <a
                                                                        href="{{ route('siswa.show', $pendaftar->siswa->id) }}">{{ $pendaftar->status }}</a>
                                                                @else
                                                                    {{ $pendaftar->status }}
                                                                @endif
                                                            </td>
                                                            <td class="text-center fonts-big">
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('pendaftar.show', $pendaftar->id) }}">Lihat</a>
                                                                @if ($pendaftar->status == 'pending')
                                                                    <button data-toggle="modal"
                                                                        data-target="#editPendaftar{{ $pendaftar->id }}"
                                                                        class="btn btn-primary"
                                                                        href="#">Ubah</button>
                                                                @endif
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class=" alert alert-info" style="border: none;">
                                                <p>Tidak ada pendaftar yang tersedia.</p>
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

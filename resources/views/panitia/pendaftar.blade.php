@extends('admin.app')
<title>Tabel Pendaftar | Shaleh </title>
<link rel="icon" href="{{ asset('dist/img/Logo Shaleh.png') }}">
@extends('panitia.sidebar')
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
                        <a class="nav-link" href="{{ route('panitia.profile') }}">
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
            <!-- Content Header (Page header) -->
            <div class="container">
                <h1>Tabel Daftar Calon Siswa </h1>
                <h6>Mohon untuk selektif dan teliti dalam menyeleksi calon siswa ! </h6>
                <hr>
                @include('user.edit.editPendaftar')
                @include('admin.delete.deletePendaftar')
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-left my-4" method="get" action="{{ route('searchPPendaftar') }}">
                    <div class="form-group w-80 mb-3">
                        <input type="text" name="search" class="form-control w-50 d-inline" id="search"
                            placeholder="Search">
                        <button type="submit" class="btn btn-primary mb-1">Cari</button>
                    </div>
                </form>

                @if (count($pendaftars) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Nama Wali</th>
                                <th>Jenjang Pendidikan</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Ubah Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftars as $pendaftar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pendaftar->name }}</td>
                                    <td>{{ $pendaftar->name_wali }}</td>
                                    <td>{{ $pendaftar->jenjangPend }}</td>
                                    <td>
                                        @if ($pendaftar->pembayaran->isNotEmpty())
                                            @foreach ($pendaftar->pembayaran as $pembayaran)
                                                {{ $pembayaran->status }}
                                            @endforeach
                                        @endif
                                    </td>

                                    <td>{{ $pendaftar->status }}</td>
                                    <td>
                                        <form action="{{ route('panitia.pendaftar.updateStatus', $pendaftar->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="pending"
                                                    {{ $pendaftar->status == 'pending' ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="accepted"
                                                    {{ $pendaftar->status == 'accepted' ? 'selected' : '' }}>Accepted
                                                </option>
                                                <option value="rejected"
                                                    {{ $pendaftar->status == 'rejected' ? 'selected' : '' }}>Rejected
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('pendaftar.show', $pendaftar->id) }}"
                                            class="btn btn-primary">Lihat</a>
                                        <a href="#" data-toggle="modal"
                                            data-target="#editPendaftar{{ $pendaftar->id }}"
                                            class="btn btn-info">Ubah</a>
                                        <a class="btn btn-danger" href="#" data-toggle="modal"
                                            data-target="#deletePendaftar{{ $pendaftar->id }}">Hapus</a>
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
                                {{ $pendaftars->links() }}
                            </div>
                        </div>
                    </div>
                @else
                    <p>Tidak ada pendaftar yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
    </div>

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

@extends('admin.app')
<title>Pembayaran Admin | Shaleh </title>
<link rel="icon" href="{{ asset('dist/img/Logo Shaleh.png') }}">
@extends('admin.sidebar')

<body class="hold-transition sidebar-mini">


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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pembayaran Calon Siswa</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <!-- Content Header (Page header) -->
            <div class="content transition">
                <div class="container-fluid dashboard">
                    <div class="col-12">
                        <div class="card">
                            <section class="content-header">

                            </section>

                            <!-- Main content -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="card-body">
                                                <div class="box-header with-border">
                                                    <h6 class="box-title">Detail Pembayaran</h6>
                                                    <form action="{{ route('searchPembayaran') }}" method="GET"
                                                        class="box-tools">
                                                        <div class="input-group">
                                                            <input type="text" name="search" class="form-control"
                                                                placeholder="Search">
                                                            <div class="input-group-btn">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Cari
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                @if ($message = Session::get('success'))
                                                    <div class="alert alert-success">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @endif
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Name Wali</th>
                                                                <th>Jenjang Pendidikan</th>
                                                                <th>Jumlah</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <br>
                                                        <tbody>
                                                            @foreach ($pembayarans as $pembayaran)
                                                                <tr>
                                                                    <td>{{ $pembayaran->pendaftar->name }}</td>
                                                                    <td>{{ $pembayaran->pendaftar->name_wali }}</td>
                                                                    <td>{{ $pembayaran->pendaftar->jenjangPend }}</td>
                                                                    <td>
                                                                        {{ $pembayaran->jumlah }}
                                                                    </td>
                                                                    <td>
                                                                        <form
                                                                            action="{{ route('pembayaran.update', $pembayaran->id) }}"
                                                                            method="POST" class="update-form"
                                                                            data-pembayaran-id="{{ $pembayaran->id }}">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <select name="status" class="form-control"
                                                                                onchange="submitForm(this)">
                                                                                <option value="bayar"
                                                                                    {{ $pembayaran->status === 'bayar' ? 'selected' : '' }}>
                                                                                    Bayar</option>
                                                                                <option value="verifikasi"
                                                                                    {{ $pembayaran->status === 'verifikasi' ? 'selected' : '' }}>
                                                                                    Verifikasi</option>
                                                                                <option value="invalid"
                                                                                    {{ $pembayaran->status === 'invalid' ? 'selected' : '' }}>
                                                                                    Invalid</option>
                                                                                <option value="terbayar"
                                                                                    {{ $pembayaran->status === 'terbayar' ? 'selected' : '' }}>
                                                                                    Terbayar</option>
                                                                            </select>
                                                                            <button type="submit"
                                                                                class="btn btn-primary"
                                                                                style="display: none;">Update</button>
                                                                        </form>

                                                                        <script>
                                                                            function submitForm(selectElement) {
                                                                                var form = selectElement.parentNode;
                                                                                form.querySelector('button[type="submit"]')
                                                                                    .click();
                                                                            }
                                                                        </script>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('pembayaran.show', $pembayaran->id) }}"
                                                                            class="btn btn-info">Lihat</a>
                                                                        <a href="{{ route('admin.print', $pembayaran->id) }}"
                                                                            class="btn btn-success">Cetak
                                                                            <i class="fas fa-print"></i></a>
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
                                                            {{ $pembayarans->links() }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <!-- /.box -->
                                        </div>

                                    </div>
                                    <!-- Main row -->
                                    <div class="row">
                                        <!-- Left col -->
                                        <section class="col-lg-7 connectedSortable">
                                            <!-- Custom tabs (Charts with tabs)-->
                                        </section>
                                    </div>
                                    <!-- /.col -->
                                </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>
    </div>

    @extends('admin.footer')

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
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
</style>

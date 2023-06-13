@extends('admin.app')
@extends('admin.sidebar')

<body class="hold-transition sidebar-mini">


    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

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
                        <a class="nav-link" href="#">
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
                            <h1 class="m-0">Admin</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                            </ol>
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
                                <h1>Pembayaran Dashboard</h1>
                            </section>

                            <!-- Main content -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="card-body">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Filter</h3>
                                                <form action="{{ route('pembayaran.dashboard') }}" method="GET"
                                                    class="box-tools">
                                                    <div class="input-group">
                                                        <input type="text" name="search" class="form-control"
                                                            placeholder="Search">
                                                        <div class="input-group-btn">
                                                            <button type="submit"
                                                                class="btn btn-primary">Search</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
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
                                                    <tbody>
                                                        @foreach ($pembayarans as $pembayaran)
                                                            <tr>
                                                                <td>{{ $pembayaran->pendaftar->name }}</td>
                                                                <td>{{ $pembayaran->pendaftar->name_wali }}</td>
                                                                <td>{{ $pembayaran->pendaftar->jenjangPend }}</td>
                                                                <td>
                                                                    @if ($pembayaran->status === 'bayar')
                                                                        {{ $pembayaran->jumlah }}
                                                                    @else
                                                                        <input type="number" name="jumlah"
                                                                            value="{{ $pembayaran->jumlah }}">
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <form
                                                                        action="{{ route('pembayaran.update', $pembayaran->id) }}"
                                                                        method="POST" id="updateForm">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <select name="status" class="form-control"
                                                                            onchange="submitForm()">
                                                                            <option value="bayar"
                                                                                {{ $pembayaran->status === 'bayar' ? 'selected' : '' }}>
                                                                                Bayar
                                                                            </option>
                                                                            <option value="verifikasi"
                                                                                {{ $pembayaran->status === 'verifikasi' ? 'selected' : '' }}>
                                                                                Verifikasi</option>
                                                                            <option value="invalid"
                                                                                {{ $pembayaran->status === 'invalid' ? 'selected' : '' }}>
                                                                                Invalid
                                                                            </option>
                                                                            <option value="terbayar"
                                                                                {{ $pembayaran->status === 'terbayar' ? 'selected' : '' }}>
                                                                                Terbayar
                                                                            </option>
                                                                        </select>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            style="display: none;">Update</button>
                                                                    </form>

                                                                    <script>
                                                                        function submitForm() {
                                                                            document.getElementById("updateForm").submit();
                                                                        }
                                                                    </script>

                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('pembayaran.show', $pembayaran->id) }}"
                                                                        class="btn btn-info">View</a>
                                                                    <a href="{{ route('pembayaran.print', $pembayaran->id) }}"
                                                                        class="btn btn-success">Print</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer clearfix">
                                                {{ $pembayarans->links() }}
                                            </div>
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

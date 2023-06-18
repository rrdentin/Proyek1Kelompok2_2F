@extends('admin.app')
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
                            <h1 class="m-0">Siswa Dashboard</h1>
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
                            <!-- Main content -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="card-body">

                                                @if (!empty($siswas) && count($siswas) > 0)
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>NIS</th>
                                                                <th>Name</th>
                                                                <th>Foto</th>
                                                                <th>Name Wali</th>
                                                                <th>Jenjang Pendidikan</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $no = 1; @endphp
                                                            @foreach($siswas as $siswa)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $siswa->nis }}</td>
                                                                <td>{{ $siswa->pendaftar->name }}</td>
                                                                <td>
                                                                    @if($siswa->pendaftar->foto)
                                                                    <img src="{{ asset('storage/'.$siswa->pendaftar->foto) }}"
                                                                        alt="Foto" height="50">
                                                                    @else
                                                                    No foto available
                                                                    @endif
                                                                </td>
                                                                <td>{{ $siswa->pendaftar->name_wali }}</td>
                                                                <td>{{ $siswa->pendaftar->jenjangPend }}</td>
                                                                <td>
                                                                    <a href="{{ route('siswa.edit', $siswa->id) }}"
                                                                        class="btn btn-primary">Edit</a>
                                                                    <form
                                                                        action="{{ route('siswa.destroy', $siswa->id) }}"
                                                                        method="POST" style="display: inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @else
                                                <div class="alert alert-info" style="border: none;">
                                                    <p>Tidak ada siswa yang tersedia.</p>
                                                </div>
                                                @endif
                                                <a href="/admin/dashboard" class="btn btn-primary btn-icon">
                                                    <i class="fas fa-arrow-left"></i>
                                                    Kembali
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
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

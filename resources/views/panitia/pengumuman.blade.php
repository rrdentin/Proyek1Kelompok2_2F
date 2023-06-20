@extends('admin.app')
    <title>Tabel Pengumuman | Shaleh </title>
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Table Pengumuman</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content transition">
                <div class="container-fluid dashboard">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <button data-toggle="modal" data-target="#createPengumuman"
                                        class="btn btn-icon btn-primary"><i class="fas fa-user-plus"></i> Tambah
                                        Pengumuman</button>
                                </div>

                                @include('admin.create.createPengumuman')
                                
                                <div class="table-bordered">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center fonts-big">No</th>
                                                <th class="text-center fonts-big">Tanggal</th>
                                                <th class="text-center fonts-big">Judul</th>
                                                <th class="text-center fonts-big">Deskripsi</th>
                                                <th class="text-center fonts-big">Gambar</th>
                                                <th class="text-center fonts-big">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengumumans as $pengumuman)
                                                <tr>
                                                    <td class="text-center fonts-big">{{ $loop->iteration }}</td>
                                                    <td class="text-center fonts-big">{{ $pengumuman->tgl_pengumuman }}</td>
                                                    <td class="text-center fonts-big">{{ $pengumuman->judul_pengumuman }}</td>
                                                    <td class="text-center fonts-big">{{ $pengumuman->desc_pengumuman }}</td>
                                                    <td class="text-center fonts-big">
                                                        <img src="{{ asset("storage/pengumuman/$pengumuman->gambar_pengumuman") }}"
                                                            width='50' height='50' class="img img-responsive" />
                                                    </td>
                                                    <td class="text-center fonts-big">
                                                        <a class="btn btn-primary" href="#" data-toggle="modal"
                                                            data-target="#editPengumuman{{ $pengumuman->id }}">Edit</a>
                                                        <a class="btn btn-danger" href="#" data-toggle="modal"
                                                            data-target="#deletePengumuman{{ $pengumuman->id }}">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @include('admin.edit.editPengumuman')
                                    @include('admin.delete.deletePengumuman')
                                </div>
                                <a href="/panitia/dashboard" class="btn btn-primary btn-icon">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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

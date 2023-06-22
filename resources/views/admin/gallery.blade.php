@extends('admin.app')
<title>Gallery Setting | Shaleh </title>
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
                            <h1 class="m-0">Table Galeri</h1>
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
                                    <div class="container">
                                        <div class="d-flex align-items-center" style="height: 50px">
                                            <div class="col-md-9">
                                                <button data-toggle="modal" data-target="#createGallery"
                                                    class="btn btn-icon btn-primary"><i class="fas fa-user-plus"></i>
                                                    Tambah Galery
                                                </button>
                                            </div>
                                            <div class="col-md-5">
                                                <form class="form-left my-4" method="get"
                                                    action="{{ route('searchGallery') }}">
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
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            @include('admin.create.createGallery')
                            <div class="table-bordered">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center fonts-big">No</th>
                                            <th class="text-center fonts-big">Kategori</th>
                                            <th class="text-center fonts-big">Keterangan</th>
                                            <th class="text-center fonts-big">Gambar</th>
                                            <th class="text-center fonts-big">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gallery as $galeri)
                                            <tr>
                                                <td class="text-center fonts-big">{{ $galeri->id }}</td>
                                                <td class="text-center fonts-big">{{ $galeri->kategori_galeri }}
                                                </td>
                                                <td class="text-center fonts-big">{{ $galeri->keterangan_galeri }}
                                                </td>
                                                <td class="text-center fonts-big">
                                                    <img src="{{ asset("storage/gallery/$galeri->gambar_galeri") }}"
                                                        width='50' height='50' class="img img-responsive" />
                                                </td>
                                                <td class="text-center fonts-big">
                                                    <a class="btn btn-primary" href="#" data-toggle="modal"
                                                        data-target="#editGallery{{ $galeri->id }}">Ubah</a>
                                                    <a class="btn btn-danger" href="#" data-toggle="modal"
                                                        data-target="#deleteGallery{{ $galeri->id }}">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @include('admin.edit.editGallery')
                                @include('admin.delete.deleteGallery')
                            </div>

                        </div>
                    </div>
                    <a href="/admin/dashboard" class="btn btn-primary btn-icon">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
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

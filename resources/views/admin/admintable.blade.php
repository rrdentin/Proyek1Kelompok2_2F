@extends('admin.app')
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
        <img class="animation__shake" src="{{ asset('/') }}dist/img/Logo Shaleh.png" alt="AdminLTELogo"
            height="170" width="195">
    </div>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-bottom: -5%;">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Table Admin</h1>
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
                                    <button data-toggle="modal" data-target="#buatAkun" class="btn btn-icon btn-primary"><i class="fas fa-user-plus"></i> Tambah Admin</button>
                                </div>
                                <div class="modal fade" id="buatAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Admin</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('admin.add-admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="username">Username:</label>
                                                        <input class="form-control form-control-sm" name="username" type="text" placeholder="Input your username" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Nama:</label>
                                                        <input class="form-control form-control-sm" name="name" type="text" placeholder="Input your name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <input class="form-control form-control-sm" name="email" type="email" placeholder="Input your email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password:</label>
                                                        <input class="form-control form-control-sm" name="password" type="password" placeholder="Input your password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passwordconfirm">Confirm Password:</label>
                                                        <input class="form-control form-control-sm" name="password_confirmation" type="password" placeholder="Confirm your password" required>
                                                    </div>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Add Admin</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table table-bordered">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="text-center fonts-big">No</th>
                                                <th class="text-center fonts-big">Nama</th>
                                                <th class="text-center fonts-big">Email</th>
                                                <th class="text-center fonts-big">Username</th>
                                                <th class="text-center fonts-big">Level</th>
                                                <th class="text-center fonts-big" colspan="2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $user)
                                                <tr>
                                                    <td class="text-center fonts-big">{{ $user->id }}</td>
                                                    <td class="text-center fonts-big">{{ $user->name }}</td>
                                                    <td class="text-center fonts-big">{{ $user->email }}</td>
                                                    <td class="text-center fonts-big">{{ $user->username }}</td>
                                                    <td class="text-center fonts-big">{{ $user->level }}</td>
                                                    <td class="text-center fonts-big">
                                                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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

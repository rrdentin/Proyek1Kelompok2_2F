@extends('layouts.userapp')
<title>Pembayaran Siswa | Shaleh </title>
<link rel="icon" href="{{ asset('dist/img/Logo Shaleh.png') }}">

<body id="top-page">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('/') }}dist/img/Logo Shaleh.png" alt="AdminLTELogo" height="170"
            width="195">
    </div>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-dark navbar-light">
            <img src="{{ asset('dist/img/Logo Shaleh.png') }}" height="40" width="45" style="margin-right: 10px"
                alt="AdminLTELogo">
            <h4 style="color: #fbfafa">Detail Pembayaran</h4>

            <!-- Right navbar links -->
            <div class="main-header navbar navbar-expand navbar-dark navbar-light" style="margin-left: 70%">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                            {{ Auth::user()->username }}
                        </a>
                        <div id="dropdownMenu" class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('user.profile') }}">View Profile</a>
                            <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        <!-- /.navbar -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="inner">
                    <center>
                        <img src="/ppdb/bank.png" alt="foto bank" style="width:60%"> <br><br>
                        <h4 style="font-weight: bold">
                            ----------------------------------------------------------------------------------------------------------------------------------------------
                        </h4>

                        <div class="container text-left">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name: </th>
                                    <td>{{ $pembayaran->pendaftar->name }}</td>
                                </tr>
                                <tr>
                                    <th>Name Wali: </th>
                                    <td>{{ $pembayaran->pendaftar->name_wali }}</td>
                                </tr>
                                <tr>
                                    <th>Jenjang Pendidikan: </th>
                                    <td>{{ $pembayaran->pendaftar->jenjangPend }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah: </th>
                                    <td>{{ $pembayaran->jumlah }}</td>
                                </tr>
                                <tr class="bg-success">
                                    <th>Status: </th>
                                    <td>{{ $pembayaran->status }}</td>
                                </tr>
                            </table>
                        </div>
                </div>
            </div>
    </div>

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

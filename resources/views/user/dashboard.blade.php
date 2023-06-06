<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 <!-- Preloader -->
 <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../dist/img/polinema.png" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#user.dashboard" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="{{route('logout')}}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      {{_('Logout')}}
        </a>
        <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
          @csrf 
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @extends('layouts.sidebar_user')

  <!-- Content Wrapper. Contains page content -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">About Me</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <strong><i class="fas fa-book mr-1"></i>Biodata Mahasiswa</strong>

      <p class="text-muted">
        <table border ="2" style="width: 100%">
        
        <!-- Penambahan Data -->
        <tr>
          <th width="500px">Username</th><th>{{Auth::user()-> username}}</th>
        </tr>
        <tr>
          <th width="500px">Nama Panjang</th><th>{{$user -> name}}</th>
        </tr>
        <tr>
          <th width="500px">Email</th><th>{{$user -> email}}</th>
        </tr>
    </table>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
            <!-- /.card -->

    
  <!-- /.content-wrapper -->
  @extends('layouts.footer_user')
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
      $("document").ready( function () {
          alert("Selamat Datang Anda Akan diarahkan ke Halaman Web Kami !, tekan ok untuk memulai petualangan");
      }); 
  </script>
  </body>
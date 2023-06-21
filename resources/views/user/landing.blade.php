@extends('layouts.source')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang | Landing</title>
    <link rel="stylesheet" href="real.css">
    <link rel="icon" type="image/icon" sizes="32x32" href="/landing/images/LogoShaleh.png">
</head>

<body id="top-page">
    {{-- Navbar Section --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-color">
        <div class="container">
            <img class="navbar-img" src="/landing/images/logoShaleh.png">
            <p class="navbar-logo-text">Sekolah Saleh</p>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#top-page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#mekanisme">Mekanisme Pendaftaran</a>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                            {{ Auth::user()->username }}
                        </a>
                        <div id="dropdownMenu" class="dropdown-menu dropdown-menu-end">
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
        </div>
    </nav>

    {{-- Header Welcoming Section --}}
    <header class="mast-hero">
        <div class="container">
            <div class="mast-hero-subheading">Selamat Datang " {{ Auth::user()->name }} " di </div>
            <div class="mast-hero-heading text-uppercase">Sekolah Shaleh</div>
            <a class="btn-hero btn-hero-style text-uppercase" href="{{ route('user.dashboard') }}">PPDB Manager </a>
        </div>
    </header>
    <marquee bgcolor="#283845" width="100%" color="#ffff">
        <h1 style="color:#FFFF00; font-size: 1rem;">Untuk memulai mendaftarkan anak ke TK / Paud Anak Saleh silahkan
            masuk ke dashboard atau tombol ppdb manager untuk melakukan registrasi calon siswa sekolah saleh malang,
            bersama Sekolah Anak Saleh Be Piously Great</h1>
    </marquee>
    {{-- Deadline Section --}}
    <div class="page-section">
    <script src="https://cdn.logwork.com/widget/countdown.js"></script>
        <a href="https://logwork.com/countdown-zaeb" class="countdown-timer" data-style="circles" 
            data-timezone="Asia/Jakarta" data-date="2023-06-28 15:00" data-background="#283845" data-digitscolor="#283845">Deadline Pendaftaran</a>
    </div>

    {{-- About Sekolah (Elang) --}}
    <section class="page-section" id="mekanisme" style="margin-top: -2rem;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Mekanisme Pendaftaran</h2>
                <h3 class="section-subheading text-muted">Berikut Berkas yang harus disiapkan Orangtua sebelum
                    mendaftarkan Ananda ke SD Anak Saleh.</h3>
                <img src="/ppdb/alvian.jpeg" style='size:px'><br>
            </div>
        </div>
    </section>
    <div>
        {{-- <img src="images/sekolah.jpg" alt="">
        <img src="images/sekolah.jpg" alt=""> --}}
    </div>

    {{-- Footer Section --}}
    @extends('layouts.footer_user')

</body>

</html>

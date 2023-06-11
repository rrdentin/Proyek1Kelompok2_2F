@extends('layouts.source')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="real.css">
    <link rel="icon" type="image/icon" sizes="32x32" href="/landing/images/LogoShaleh.png">
</head>

<body id="top-page">
    {{-- Navbar Section (Elang) --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-color">
        <div class="container">
            <img class="navbar-img" src="/landing/images/LogoShaleh.png"  sizes="32x32">
            <p class="navbar-logo-text">Sekolah Anak Shaleh</p>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#top-page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Header Welcoming Section (Elang) --}}
    <header class="mast-hero">
        <div class="container">
            <div class="mast-hero-subheading">Selamat Datang </div>
            <div class="mast-hero-heading text-uppercase">Sekolah Anak Saleh</div>
            <div class="mast-hero-subheading">Mendidik Dan Berbakti Untuk Negeri</div>
            <a class="btn-hero btn-hero-style text-uppercase" href="#about">Daftar Sekaranng ! </a>
        </div>
        
    </header>
    <marquee bgcolor="#283845" width="100%" color="#ffff">
        <h1 style="color:#FFFF00; font-size: 1rem;" >Penting : Pendaftaran Akan segera ditutup ! daftarkan segera anak anda, bersama Sekolah Anak Saleh Be Piously Great</h1>
    </marquee>
    {{-- Deadline Section --}}
    <div class="page-section">
        <script src="https://cdn.logwork.com/widget/countdown.js"></script>
        <a href="https://logwork.com/countdown-z11m" class="countdown-timer" data-style="circles" data-timezone="Asia/Jakarta" data-date="2023-06-22 14:00" data-background="#283845" data-digitscolor="#283845">Deadline Pendaftaran !</a>
    </div>

    {{-- About Sekolah (Elang) --}}
    <section class="page-section" id="about" style="margin-top: -2rem;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Sekolah Anak Saleh</h2>
                <h3 class="section-subheading text-muted">Yayasan Pendidikan Anak Saleh yang berdiri sejak tahun 1996 dan didirikan dalam rangka ikut berperan membangun pendidikan yang berciri keislaman, keperadaban, kecendekiaan, keindonesiaan dan kealamiahan. Selain untuk mernbantu Permerintah dalam pembangunan di bidang pendidikan, juga membantu masyarakat dan orang tua yang secara bersama-sama menumbuhkembangkan peserta didik dalam memahami nilai budaya, keislaman, kesehatan, teknologi, peradaban, kebangsdan dan kealamiahan. Nama anak saleh merupakan pencapaian yang diharapkan dari hasil pendidikan</h3>
            </div>
        </div>
    </section>

    {{-- About section 1 --}}
    <section class="about-section">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-section rounded-circle" src="/landing/images/about/sejarah1.png" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4 section-right">Pada Tahun 1996</h2>
                        <p class="about-section-text section-right">Pada tahun 1997 Yayasan Pendidikan Anak Saleh mendirikan Kelompok Bermain Anak Saleh di mana pendirian Kelompok Bermain ini merupakan hasil dari kajian keislaman beberapa pakar Pendidikan muslim di kota Malang yakni Prof. Dr. H. Sonhadji K.H., Ph.D, Prof. Dr. H. Imron Arifin., M.Pd, dan beberapa pakar Pendidikan lainnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About section 2 --}}
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-5 section-right"><img class="img-section rounded-circle" src="/landing/images/about/sejarah2.png" alt="..." /></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">Pada Tahun 1998</h2>
                        <p class="about-section-text"> Pada tahun 1998 Taman Kanak-Kanak Anak Saleh didirikan dan semakin lama semakin besar hingga pada layanan TPA (Taman Pengasuhan Anak). Pendirian satuan Pendidikan sejak usia dini didasari oleh keprihatinan para cendekia muslim kota Malang akan Pendidikan berbasis islam di kota Malang yang kurang bersinar pada saat itu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        {{-- <img src="images/sekolah.jpg" alt="">
        <img src="images/sekolah.jpg" alt=""> --}}
    </div>

    {{-- Footer Section (Elang) --}}

    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy;Tim IT Kel2. 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-light mx-2 ft-twitter" href="#" aria-label="Twitter"></a>
                    <a class="btn btn-light mx-2 ft-facebook" href="#" aria-label="Facebook"></a>
                    <a class="btn btn-light mx-2 ft-instagram" href="#" aria-label="Instagram"></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-light text-decoration-none me-3" href="#">Privacy Policy</a>
                    <a class="link-light text-decoration-none" href="#">Terms of Use</a>
                </div>
            </div>
            Yayasan Pendidikan Anak Saleh
        </div>
    </footer>

</body>

</html>

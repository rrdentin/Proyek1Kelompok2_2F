@extends('layouts.source')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
</head>

<body id="top-page">
    {{-- Navbar Section (Elang) --}}
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-color">
        <div class="container">
            <img class="navbar-img" src="/landing/images/logo.png">
            <p class="navbar-logo-text">EgaKids</p>

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
            <div class="mast-hero-subheading">Sekolah Terbaik Sejagat Anime by Ega The Kids!</div>
            <div class="mast-hero-heading text-uppercase">Selamat Datang Kalian Anak-Anak Baru😋</div>
            <a class="btn-hero btn-hero-style text-uppercase" href="#about">Tentang Sekolah EgaKids</a>
        </div>
    </header>
    <script src="https://cdn.logwork.com/widget/countdown.js"></script>
<a href="https://logwork.com/countdown-yi35" class="countdown-timer" data-timezone="Asia/Jakarta" data-date="2023-06-20 15:00">Pengumuman Hasil SNBT</a>
    {{-- About Sekolah (Elang) --}}
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Tentang Sekolah EgaKids</h2>
                <h3 class="section-subheading text-muted">Yayasan Pendidikan Anak Saleh berkomitmen untuk mendirikan Pendidikan sejak usia dini hingga lanjutan, oleh karenanya Kelompok Bermain sebagai satuan Pendidikan level basic yang mendasar dioperasionalkan lebih awal.</h3>
            </div>
        </div>
    </section>

    {{-- About section 1 --}}
    <section class="about-section">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-section rounded-circle" src="/landing/images/about/01.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4 section-right">Pada Tahun 1997</h2>
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
                    <div class="p-5 section-right"><img class="img-section rounded-circle" src="/landing/images/about/01.jpg" alt="..." /></div>
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
                <div class="col-lg-4 text-lg-start">Copyright &copy;AdamCorp. 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-light mx-2" href="#" aria-label="Twitter"></a>
                    <a class="btn btn-light mx-2" href="#" aria-label="Facebook"></a>
                    <a class="btn btn-light mx-2" href="#" aria-label="Instagram"></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-light text-decoration-none me-3" href="#">Privacy Policy</a>
                    <a class="link-light text-decoration-none" href="#">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>

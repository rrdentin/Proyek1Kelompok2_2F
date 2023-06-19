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
            <img class="navbar-img" src="/landing/images/LogoShaleh.png" sizes="32x32">
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
                        <a class="nav-link" href="#one">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tutors">Tim IT</a>
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
            <a class="btn-hero btn-hero-style text-uppercase" href="{{ route('register') }}">Daftar Sekarang ! </a>
        </div>

    </header>
    <marquee bgcolor="#283845" width="100%" color="#ffff">
        <h1 style="color:#FFFF00; font-size: 1rem;">Penting : Pendaftaran Akan segera ditutup ! daftarkan segera anak
            anda, bersama Sekolah Anak Saleh Be Piously Great</h1>
    </marquee>
    {{-- Deadline Section --}}
    <div class="page-section">
        <script src="https://cdn.logwork.com/widget/countdown.js"></script>
        <a href="https://logwork.com/countdown-z11m" class="countdown-timer" data-style="circles"
            data-timezone="Asia/Jakarta" data-date="2023-06-22 14:00" data-background="#283845"
            data-digitscolor="#283845">Deadline Pendaftaran !</a>
    </div>

    {{-- About Sekolah (Elang) --}}
    <section class="page-section" id="about" style="margin-top: -2rem;">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Sekolah Anak Saleh</h2>
                <h3 class="section-subheading text-muted">Yayasan Pendidikan Anak Saleh yang berdiri sejak tahun 1996
                    dan didirikan dalam rangka ikut berperan membangun pendidikan yang berciri keislaman, keperadaban,
                    kecendekiaan, keindonesiaan dan kealamiahan. Selain untuk mernbantu Permerintah dalam pembangunan di
                    bidang pendidikan, juga membantu masyarakat dan orang tua yang secara bersama-sama
                    menumbuhkembangkan peserta didik dalam memahami nilai budaya, keislaman, kesehatan, teknologi,
                    peradaban, kebangsdan dan kealamiahan. Nama anak saleh merupakan pencapaian yang diharapkan dari
                    hasil pendidikan</h3>
            </div>
        </div>
    </section>

    {{-- About section 1 --}}
    <section class="about-section">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-section rounded-circle" src="/landing/images/about/sejarah1.png"
                            alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4 section-right">Pada Tahun 1997</h2>
                        <p class="about-section-text section-right">Pada tahun 1997 Yayasan Pendidikan Anak Saleh
                            mendirikan Kelompok Bermain Anak Saleh di mana pendirian Kelompok Bermain ini merupakan
                            hasil dari kajian keislaman beberapa pakar Pendidikan muslim di kota Malang yakni Prof. Dr.
                            H. Sonhadji K.H., Ph.D, Prof. Dr. H. Imron Arifin., M.Pd, dan beberapa pakar Pendidikan
                            lainnya.</p>
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
                    <div class="p-5 section-right"><img class="img-section rounded-circle"
                            src="/landing/images/about/sejarah2.png" alt="..." /></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">Pada Tahun 1998</h2>
                        <p class="about-section-text"> Pada tahun 1998 Taman Kanak-Kanak Anak Saleh didirikan dan
                            semakin lama semakin besar hingga pada layanan TPA (Taman Pengasuhan Anak). Pendirian satuan
                            Pendidikan sejak usia dini didasari oleh keprihatinan para cendekia muslim kota Malang akan
                            Pendidikan berbasis islam di kota Malang yang kurang bersinar pada saat itu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        {{-- <img src="images/sekolah.jpg" alt="">
        <img src="images/sekolah.jpg" alt=""> --}}
    </div>

    <!-- pengumuman -->
    <section id="one" class="wrapper style2">

        <div class="inner">
            <div class="grid-style">

                <div>
                    <div class="box">
                        <div class="image fit">
                            <img src="images/img-1.png" style="height:450px;" alt="" />
                        </div>
                        <div class="content">
                            <header class="align-center">
                                <p>Baca Selengkapnya</p>
                                <h2>Pengumuman1</h2>
                            </header>
                            <p>akan muncul bila galery sudah bisa</p>
                            <footer class="align-center">
                                <a target="_blank" href="https://id.wikipedia.org/wiki/Madrasah_aliah"
                                    class="button alt">Lebih Lengkap</a>
                            </footer>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="box">
                        <div class="image fit">
                            <img src="images/img-2.png" style="height: 450px;" alt="" />
                        </div>
                        <div class="content">
                            <header class="align-center">
                                <p>Baca Selengkapnya</p>
                                <h2>Pengumuman2</h2>
                            </header>
                            <p>Akan muncul bila galery sudah bisa</p>
                            <footer class="align-center">
                                <a target="_blank"
                                    href="https://www.google.com/search?q=apa+itu+sistem+informasi+alumni&oq=apa+itu+sistem+informasi+alumni&aqs=chrome..69i57.4178j0j4&sourceid=chrome&ie=UTF-8"
                                    class="button alt">Lebih Lengkap</a>
                            </footer>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section id="tutors">
        <div class="tengah">
            <div class="kolom">
                <p class="deskripsi">Staf IT</p>
                <h2>Anak Saleh</h2>
                <p>Periode 2023-2024</p>
            </div>
        </div>

        <div class="container">
            <div class="tutor-list">
                <div class="kartu-tutor">
                    <img src="/landing/images/about/1.png" />
                    <p style="text-align: center; margin-left: -15%">M Ega Rama Fernanda</p>
                </div>
                <div class="kartu-tutor">
                    <img src="/landing/images/about/2.png" />
                    <p style="text-align: center; margin-left: -15%">Abdullah Azzam</p>
                    </h7>
                </div>
                <div class="kartu-tutor">
                    <img src="/landing/images/about/3.png" />
                    <p style="text-align: center; margin-left: -15%">Alvian Nur Firdaus</p>
                </div>
                <div class="kartu-tutor">
                    <img src="/landing/images/about/4.png" />
                    <p style="text-align: center; margin-left: -15%">Elang Putra Adam</p>
                </div>
                <div class="kartu-tutor">
                    <img src="/landing/images/about/5.png" />
                    <p style="text-align: center; margin-left: -15%">Rr Denti Nurramadhona</p>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section id="tutors">
            <div class="tengah">
            <div class="kolom">
                <p class="deskripsi">Tutorial Pendaftaran</p>
                <h2>Anak Saleh</h2>
            </div>
                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="534" height="300" type="text/html" src="https://www.youtube.com/embed/xskyxQOCkRw?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0&origin=https://youtubeembedcode.com"><div><small><a href="https://youtubeembedcode.com/pl/">youtubeembedcode pl</a></small></div><div><small><a href="https://allabeviljas.se/">smslån som beviljar alla</a></small></div><div><small><a href="https://youtubeembedcode.com/pl/">youtubeembedcode pl</a></small></div><div><small><a href="https://skipborules.com/">skipborules.com</a></small></div><div><small><a href="https://youtubeembedcode.com/nl/">youtubeembedcode nl</a></small></div><div><small><a href="https://xn--snabbln5000-28a.com/lana-2000/">låna 2000</a></small></div><div><small><a href="https://youtubeembedcode.com/en">youtubeembedcode.com/en/</a></small></div><div><small><a href="https://nouc.se/sms-lan/handelsbanken/">sms lån handelsbanken</a></small></div></iframe>
            </div>
                    
                    <br>
        <br>
        <br>
    </section>
    {{-- Footer Section (Elang) --}}

    <footer class="footer py-4" id="kaki">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy;Tim IT Kel2. 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-light mx-2 ft-twitter" href="https://twitter.com/AnakSalehMalang?s=20" aria-label="Twitter"></a>
                    <a class="btn btn-light mx-2 ft-facebook" href="https://web.facebook.com/pages/Anak-Saleh-El-school/206693209353991" aria-label="Facebook"></a>
                    <a class="btn btn-light mx-2 ft-instagram" href="https://www.instagram.com/paudterpaduanaksalehmalang/?hl=id" aria-label="Instagram"></a>
                </div>

                <div class="col-lg-4 text-lg-end">
                    <a class="link-light text-decoration-none me-3" href="#popup">Privacy Policy</a>
                    <div id="popup">
                        <div class="window">
                            <a href="#kaki" class="close-button" title="Close">X</a>
                            <h6>Privacy Policy</h6>
                            <p>
                                <h7>memastikan bahwa hanya Anda yang dapat mengetahui password akun anda, dan tidak ada
                                    siapa pun di antaranya, bahkan developer pun. Hal ini karena, dengan enkripsi secara
                                    HashPassword, Password Anda diamankan dengan sebuah kunci.</h7>
                        </div>
                    </div>

                    <a class="link-light text-decoration-none" href="#popupp">Terms of Use</a>
                    <div id="popupp">
                        <div class="window">
                            <a href="#kaki" class="close-button" title="Close">X</a>
                            <h6>Dalam penggunaan web ini, Anda setuju untuk:</h6>
                            <p>
                                <h7>memberikan informasi yang akurat, baru dan komplit tentang diri Anda saat mengisi
                                    formulir pendaftaran pada sekolah saleh.
                                    menjaga dan secara berkala meng-update informasi tentang diri Anda dan informasi
                                    lainnya secara akurat, baru dan komplit
                                    menerima seluru risiko dari akses ilegal atas informasi dan data regsitrasi
                                    bertanggung jawab atas proteksi dan back up data dan atau peralatan yang digunakan
                                </h7>
                        </div>
                    </div>
                </div>
            </div>
            Yayasan Pendidikan Anak Saleh
        </div>
    </footer>

</body>

</html>

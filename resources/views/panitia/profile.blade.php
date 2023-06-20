@extends('layouts.header_user')
<title>Profile | Shaleh</title>
<link rel="icon" type="image/icon" sizes="32x32" href="/landing/images/LogoShaleh.png">
@section('content2')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <section class="vh-100 d-flex align-items-center" style="background-color: #f4f5f7;">
        <div class="container py-6">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : 'https://media.istockphoto.com/id/1316420668/vector/user-icon-human-person-symbol-social-profile-icon-avatar-login-sign-web-user-symbol.jpg?s=612x612&w=0&k=20&c=AhqW2ssX8EeI2IYFm6-ASQ7rfeBWfrFFV4E87SaFhJE=' }}"
                                    class="img-fluid mt-5 mb-4 rounded-circle"
                                    style="width: 110px; height: 110px; object-fit: cover; border-radius: 50%;" />
                                <h6 class="mb-1">{{ Auth::user()->name }}</h6>
                                <hr>
                                <p>{{ Auth::user()->username }}</p>
                                <a href="{{ route('panitia.edit.editProfile') }}" class="change-password-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Informasi</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-8 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted text-nowrap">{{ Auth::user()->email ?? '-' }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Nomor Telepon</h6>
                                            <p class="text-muted">{{ Auth::user()->noHp ?? '-' }}</p>
                                        </div>
                                    </div>
                                    <h6>Detail</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Jenis Kelamin</h6>
                                            <p class="text-muted">{{ Auth::user()->jenKel ?? '-' }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Tanggal Lahir</h6>
                                            <p class="text-muted">{{ Auth::user()->tglLahir ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<style>
    .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, #4CAF50, #8BC34A);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, #283845, #283845);
    }

    .change-password-link svg {
        fill: white;
        transition: fill 0.3s ease;
    }

    .change-password-link:hover svg {
        fill: black;
        /* Change to the desired color */
    }
</style>

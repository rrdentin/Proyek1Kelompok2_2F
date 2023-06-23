@extends('layouts.header_user')
<title>Edit Profile | Shaleh</title>
<link rel="icon" type="image/icon" sizes="32x32" href="/landing/images/LogoShaleh.png">
@section('content2')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <body style="background-color: #f4f5f7;">
        <div class="container">
            <div class="row gutters" style="padding: 10%;">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body" style="margin-top: 30px;">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img id="profileImage"
                                            src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : 'https://media.istockphoto.com/id/1316420668/vector/user-icon-human-person-symbol-social-profile-icon-avatar-login-sign-web-user-symbol.jpg?s=612x612&w=0&k=20&c=AhqW2ssX8EeI2IYFm6-ASQ7rfeBWfrFFV4E87SaFhJE=' }}"
                                            alt="profile">
                                    </div>

                                    <h5 class="user-name">email</h5>
                                    <h6 class="user-email">{{ Auth::user()->email }}</h6>
                                </div>
                                <div class="about">
                                    <h6><a href="{{ route('password.change') }}">Ubah Password</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100"style="background-color: #ffff;">
                        <div class="card-body">
                            <form action="{{ route('admin.update-user') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">Detail Personal</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="{{ Auth::user()->name ? Auth::user()->name : 'Enter full name' }}"
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="{{ Auth::user()->username ? Auth::user()->username : 'Enter username' }}"
                                                value="{{ Auth::user()->username }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="noHp">Nomor Telepon</label>
                                            <input type="text" class="form-control" id="noHp" name="noHp"
                                                placeholder="{{ Auth::user()->noHp ? Auth::user()->noHp : 'Enter phone number' }}"
                                                value="{{ Auth::user()->noHp }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="jenKel">Jenis Kelamin</label>
                                            <select class="form-control" id="jenKel" name="jenKel">
                                                <option value="Perempuan"
                                                    {{ Auth::user()->jenKel === 'Perempuan' ? 'selected' : '' }}>Perempuan
                                                </option>
                                                <option value="Laki-laki"
                                                    {{ Auth::user()->jenKel === 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="tglLahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tglLahir" name="tglLahir"
                                                value="{{ Auth::user()->tglLahir }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="foto">Foto Profil</label>
                                            <input type="file" class="form-control" id="foto" name="foto"
                                                accept="image/*" onchange="previewImage(event)">
                                            <small id="fotoHelp" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="deleteFoto">Hapus Foto Profil</label>
                                            <div class="form-check">
                                                <input class="form-check-input" style="border-color: black;" type="checkbox"
                                                    id="deleteFoto" name="delete_foto">
                                                <label class="form-check-label" for="deleteFoto">
                                                    Hapus foto profil saat ini
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <a href="{{ '/' . auth()->user()->level . '/profile' }}"
                                                class="btn btn-secondary">
                                                <i class="fas fa-arrow-left"></i>
                                                Kembali
                                            </a>
                                            <button type="submit" id="submit" name="submit"
                                                class="btn btn-primary">Ubah</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection


<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var img = document.getElementById("profileImage");
            img.src = reader.result;
        }

        var input = event.target;
        var file = input.files[0];

        if (file) {
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, check if there's an existing image from the database
            var existingImage = document.getElementById("existingImage");
            if (existingImage && existingImage.src) {
                var img = document.getElementById("profileImage");
                img.src = existingImage.src;
            }
        }
    }

    function deleteProfileImage() {
        var img = document.getElementById("profileImage");
        img.src = ""; // Set an empty source to remove the image

        var fotoHelp = document.getElementById("fotoHelp");
        fotoHelp.textContent = "No profile image selected";

        var deleteButton = document.getElementById("deleteButton");
        deleteButton.style.display = "none";

        // Set the file input value to null to clear the selected file
        var fileInput = document.getElementById("foto");
        fileInput.value = null;
    }
</script>


<style>
    body {
        margin: 0;
        padding-top: 40px;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
    }

    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }

    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #283845;
    }

    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }

    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #283845;
    }

    .account-settings .about p {
        font-size: 0.825rem;
    }

    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #283845;
        color: #2e323c;
    }

    .card {
        background: #283845;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }
</style>

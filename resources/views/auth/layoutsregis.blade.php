<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="masuk/fonts/icomoon/style.css">

    <link rel="stylesheet" href="masuk/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="masuk/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="masuk/css/style.css">
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        .password-eye.closed {
            color: #999999;
            opacity: 0.6;
        }
    </style>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('id_password');

        togglePassword.addEventListener('click', function() {
            // toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            // toggle the eye icon
            const icon = togglePassword.querySelector('i');
            icon.classList.toggle('fa-eye-slash');
            // change the color of the eye icon when closed
            icon.style.color = type === 'password' ? '#999999' : '#495057';
        });

        const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
        const passwordConfirmInput = document.getElementById('password-confirm');

        togglePasswordConfirm.addEventListener('click', function() {
            // toggle the type attribute
            const type = passwordConfirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirmInput.setAttribute('type', type);
            // toggle the eye icon
            const icon = togglePasswordConfirm.querySelector('i');
            icon.classList.toggle('fa-eye-slash');
            // change the color of the eye icon when closed
            icon.style.color = type === 'password' ? '#999999' : '#495057';
        });
    </script>

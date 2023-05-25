<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}">
    

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Hz6XBs0VdMh1l+kswJu3T1C7z25L7CUuejN7DjqJT5zcUViyAeA33X7BXd1+G9Dy" crossorigin="anonymous"></script>

</head>
<body>
</body>
</html>
<script>
    function toggleDropdown() {
        var dropdownMenu = document.getElementById('dropdownMenu');
        dropdownMenu.classList.toggle('show');
    }
</script>
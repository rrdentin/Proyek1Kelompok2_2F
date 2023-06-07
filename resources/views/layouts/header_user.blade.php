@extends('layouts.source')
@section('content')
<body id="top-page">
    {{-- Navbar Section --}}
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                            {{ Auth::user()->username }}
                        </a>
                        <div id="dropdownMenu" class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('user.profile') }}">View Profile</a>
                            <a class="dropdown-item" href="{{ route('user.dashboard')}}">Dashboard</a>
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

@yield('content2')
@endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BAND UP</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/fontawesome.js') }}" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    <div id="">
        <!-- navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm shadow fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-music"></i> BAND UP
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link effect3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link effect3" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <li class="nav-item">
                                <a class="nav-link effect3" href="{{ route('user.index') }}"><i class="fas fa-users"></i>&nbsp;{{ __('Users') }}</a>
                        </li>

                            <li class="nav-item">
                                <a class="nav-link effect3" href="{{ route('jam.index') }}"><i class="fas fa-guitar"></i>&nbsp;{{ __('Jam Sessions') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link effect3" href="{{ route('event.index') }}"><i class="fas fa-calendar-day"></i>&nbsp;{{ __('Events') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link effect3" href="{{ route('about') }}"><i class="far fa-address-card"></i>&nbsp;{{ __('About') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: relative; padding-left: 50px;">
                                            <img src="{{ URL::to('/') }}/uploads/avatars/{{ Auth::user()->avatar }}" class="nav-image"> {{ Auth::user()->name }} 
                                    </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('jam.upload') }}">
                                        <i class="fas fa-guitar"></i>&nbsp;{{ __('Upload a Jam Session') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        <i class="fas fa-user"></i>&nbsp;&nbsp;{{ __('Your Profie') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar -->
        <!-- Content -->
        <main class="py-4" style="min-height: 100vh">
            @yield('content')
        </main>
        <!-- Content -->
        <!-- Footer -->
        <footer class="page-footer font-small navbar-dark bg-dark" style="color:white;position:absolute;width:100%;">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href="#"> Bandup.com</a>
        </div>
        <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</html>

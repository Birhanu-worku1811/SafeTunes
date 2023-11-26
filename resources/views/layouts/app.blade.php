<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($pageTitle) ? config('app.name', 'SafeTunes') . ' - ' . $pageTitle : config('app.name', 'SafeTunes') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'SafeTunes') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.index') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.about') }}">{{ __('About') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdownPages" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Music
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownPages">
                        <a class="dropdown-item" href="#">Artists</a>
                        <a class="dropdown-item" href="#">Blog</a>
                        <a class="dropdown-item" href="#">Albums</a>
                        <a class="dropdown-item" href="{{route('music.index')}}">Playlists</a>
                        <a class="dropdown-item" href="#">Categories</a>
                        <a class="dropdown-item" href="{{ route('news.index') }}">News</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.contact') }}">{{ __('Contact') }}</a>
                </li>

                @guest
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>

                    @endif
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
            @endguest
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>
</body>
</html>

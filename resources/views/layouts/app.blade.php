@php use App\Models\Music;use Illuminate\Support\Facades\Auth; @endphp
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($pageTitle) ? config('app.name', 'SafeTunes') . ' | ' . $pageTitle : config('app.name', 'SafeTunes') }}</title>

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
                        <a class="dropdown-item" href="{{ route('artist.index') }}">Artists</a>
                        <a class="dropdown-item" href="#">Blog</a>
                        <a class="dropdown-item" href="{{ route('album.index') }}">Albums</a>
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
                            @can('create', Music::class)
                                <a class="dropdown-item" href="{{ route('music.create') }}">Add new music</a>
                            @endcan
                            <a class="dropdown-item"
                               href="{{ route('artist.show', ['artist' => Auth::user()->artist_id ?? Auth::user()->id]) }}"> My Profile</a>
                            <a class="dropdown-item" href="#">Favourites</a>
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

<footer
    class="text-center text-lg-start text-white"
    style="background-color: black">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">
                        {{ env("APP_NAME") }}
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.
                    </p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none"/>

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                    <p>
                        <a class="text-white">MDBootstrap</a>
                    </p>
                    <p>
                        <a class="text-white">MDWordPress</a>
                    </p>
                    <p>
                        <a class="text-white">BrandFlow</a>
                    </p>
                    <p>
                        <a class="text-white">Bootstrap Angular</a>
                    </p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none"/>

                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none"/>

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                    <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                    <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                    <!-- Facebook -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #3b5998"
                        href="#!"
                        role="button"
                    ><i class="fab fa-facebook-f"></i
                        ></a>

                    <!-- Twitter -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #55acee"
                        href="#!"
                        role="button"
                    ><i class="fab fa-twitter"></i
                        ></a>

                    <!-- Google -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #dd4b39"
                        href="#!"
                        role="button"
                    ><i class="fab fa-google"></i
                        ></a>

                    <!-- Instagram -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #ac2bac"
                        href="#!"
                        role="button"
                    ><i class="fab fa-instagram"></i
                        ></a>

                    <!-- Linkedin -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #0082ca"
                        href="#!"
                        role="button"
                    ><i class="fab fa-linkedin-in"></i
                        ></a>
                    <!-- Github -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #333333"
                        href="#!"
                        role="button"
                    ><i class="fab fa-github"></i
                        ></a>
                </div>
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.2)"
    >
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/"
        >MDBootstrap.com</a
        >
    </div>
    <!-- Copyright -->
</footer>

</body>
</html>

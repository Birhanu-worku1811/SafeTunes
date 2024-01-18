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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha512-..." crossorigin="anonymous"/>

    <div class="animate__animated animate__zoomIn"> <!-- Add animation classes here -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-dark navbar-expand-md navbar-light shadow-sm text-white"
     style="background-color: #051b11; padding: 20px">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'SafeTunes') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon text-white"></span>
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
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownPages"
                         style="background-color: #051b11; padding: 20px">
                        <a class="dropdown-item" href="{{ route('artist.index') }}">Artists</a>
                        <a class="dropdown-item" href="{{ route('album.index') }}">Albums</a>
                        <a class="dropdown-item" href="{{ route('music.index') }}">Musics</a>
                        <a class="dropdown-item" href="{{route('music.index')}}">Playlists</a>
                        <a class="dropdown-item" href="#">Categories</a>
                        <a class="dropdown-item" href="{{ route('news.index') }}">News</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.contact') }}">{{ __('Contact') }}</a>
                </li>

                @guest()
                    @if(!Auth::guard('admin')->check())
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
                                {{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name: Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"
                                 style="background-color: #051b11; padding: 20px">
                                @can('create', Music::class)
                                    <a class="dropdown-item" href="{{ route('music.create') }}">Add new music</a>
                                @endcan
                                @auth('admin')
                                    <a class="dropdown-item"
                                       href="{{ route('news.create') }}">
                                        Add News</a>
                                    <a class="dropdown-item" href="{{route('admin-dashboard')}}">Dashboard</a>
                                    <a class="dropdown-item" href="{{route('admin.users.index')}}">Users</a>
                                    <a class="dropdown-item" href="{{route('admin.admins.index')}}">Admins</a>
                                @endauth
                                @auth()
                                    @if(Auth::user()->is_artist)
                                        <a class="dropdown-item"
                                           href="{{ route('artist.show', ['artist' => Auth::user()->id]) }}">
                                            Your Profile</a>
                                    @else
                                        <a class="dropdown-item"
                                           href="{{ route('user.profile', ['id' => Auth::user()->id]) }}">
                                            Your Profile</a>
                                    @endif
                                @endauth
                                <a class="dropdown-item" href="#">Favourites</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name: Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"
                             style="background-color: #051b11; padding: 20px">
                            @can('create', Music::class)
                                <a class="dropdown-item" href="{{ route('music.create') }}">Add new music</a>
                                <a class="dropdown-item" href="{{ route('album.create') }}">Add new album</a>
                            @endcan
                            @auth('admin')
                                <a class="dropdown-item"
                                   href="{{ route('admin.profile', Auth::guard('admin')->user()->id) }}">
                                    Your Profile</a>
                            @endauth
                            @auth()
                                @if(Auth::user()->is_artist)
                                    <a class="dropdown-item"
                                       href="{{ route('artist.show', ['artist' => Auth::user()->id]) }}">
                                        Your Profile</a>
                                @else
                                    <a class="dropdown-item"
                                       href="{{ route('user.profile', ['id' => Auth::user()->id]) }}">
                                        Your Profile</a>
                                @endif
                            @endauth
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

                <form class="d-flex" role="search" action="{{route("search.results")}}" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                           name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
        </div>
    </div>
</nav>


<main class="py-4">
    @yield('content')
</main>

<footer
    class="text-center text-lg-start text-white"
    style="background-color: #051b11">
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
                        Listen to Musics of
                        your choice while staying secured
                    </p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none"/>

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Places</h6>
                    <p>
                        <a href="{{route('home.index')}}" class="text-white">Home</a>
                    </p>
                    <p>
                        <a href="{{ route('home.about') }}" class="text-white">Contact</a>
                    </p>
                    <p>
                        <a href="{{ route('home.about') }}" class="text-white">About</a>
                    </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Music</h6>
                    <p>
                        <a href="{{ route('news.index') }}" class="text-white">News</a>
                    </p>
                    <p>
                        <a href="{{ route('artist.index') }}" class="text-white">Artists</a>
                    </p>
                    <p>
                        <a href="{{ route('music.index') }}" class="text-white">Musics</a>
                    </p>
                    <p>
                        <a href="{{ route('album.index') }}" class="text-white">Albums</a>
                    </p>
                    <p>
                        <a href="#" class="text-white">Categories</a>
                    </p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none"/>

                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none"/>


                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                    <!-- Facebook -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #3b5998"
                        href="https://www.facebook.com"
                        role="button"
                    ><i class="fab fa-facebook-f"></i
                        ></a>

                    <!-- Google -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #dd4b39"
                        href="birhanuworku2011@gmail.com"
                        role="button"
                    ><i class="fab fa-google"></i
                        ></a>

                    <!-- Instagram -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #ac2bac"
                        href="https://www.instagram.com"
                        role="button"
                    ><i class="fab fa-instagram"></i
                        ></a>

                    <!-- Linkedin -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #0082ca"
                        href="https://www.linkdin.com"
                        role="button"
                    ><i class="fab fa-linkedin-in"></i
                        ></a>
                    <!-- Github -->
                    <a
                        class="btn btn-primary btn-floating m-1"
                        style="background-color: #333333"
                        href="https://www.github.com"
                        role="button"
                    ><i class="fab fa-github"></i
                        ></a>

                </div>
                <form class="d-flex" role="search" method="get" action="{{ route("search.results") }}">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                           name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
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
        © 2023 Copyright:
        <a class="text-white" href="birhanuworu.ethiopia"
        >Birhanu worku</a
        >
    </div>
    <!-- Copyright -->
</footer>

@stack('scripts')

</body>
</html>

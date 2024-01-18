@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
{{--            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">--}}
{{--                <div class="sidebar-sticky">--}}
{{--                    <ul class="nav flex-column">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" href="#">--}}
{{--                                <i class="bi bi-house-door"></i> Dashboard--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">--}}
{{--                                <i class="bi bi-person"></i> Users--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">--}}
{{--                                <i class="bi bi-music-note"></i> Musics--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">--}}
{{--                                <i class="bi bi-album"></i> Albums--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">--}}
{{--                                <i class="bi bi-newspaper"></i> News--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </nav>--}}

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Admin Dashboard</h1>
                </div>

                <!-- Statistics Section -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">New Users</h5>
                                <a href="{{route('admin.users.index')}}"><p class="card-text">{{ $users->count() }} users added in the last 3 days</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">New Musics</h5>
                                <a href="{{route('music.index')}}"><p class="card-text">{{ $musics->count() }} musics added in the last 3 days</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">New Albums</h5>
                                <a href="{{route('album.index')}}"><p class="card-text">{{ $albums->count() }} albums added in the last 3 days</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">New News</h5>
                                <a href="{{route('news.index')}}"><p class="card-text">{{ $news->count() }} news articles added in the last 3 days</p></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Users Table Section -->
                <section>
                    <h2>New Users</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>

                <!-- Other Sections for Musics, Albums, and News -->

            </main>
        </div>
    </div>
@endsection

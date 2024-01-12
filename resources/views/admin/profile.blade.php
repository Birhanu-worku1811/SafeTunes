@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Profile</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ Auth::guard('admin')->user()->name }}</h5>
                <p class="card-text">{{ Auth::guard('admin')->user()->email }}</p>
                <p class="card-text">Role: Admin</p>
                <!-- Add other admin-specific profile details here -->
            </div>
        </div>
    </div>
@endsection

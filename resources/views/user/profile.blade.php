@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Profile</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text">{{ $user->name }}</p>
                <!-- Add other user-specific profile details here -->
            </div>
        </div>
    </div>
@endsection

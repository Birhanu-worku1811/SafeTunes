@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $artist->name }}</h5>
                <hr>
                <p class="card-text">Bio: {{ $artist->bio }}</p>
                <p class="card-text">Genre: {{ $artist->genre }}</p>
                <p class="card-text">Band Name: {{ $artist->band_name }}</p>
                <p class="card-text">Instruments: {{ $artist->instrument }}</p>
                @can('update', $artist)
                    <a href="{{ route('artist.edit', $artist->id) }}" class="btn btn-primary">Edit Profile</a>
                @endcan
            </div>
        </div>
    </div>
@endsection

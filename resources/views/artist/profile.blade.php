@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($artist->photo) }}" class="card-img-top" alt="Artist Image" style="max-width: 200px; max-height: 200px;">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ $artist->name }}</h5>
                        <p class="card-text">Bio: {{ $artist->bio }}</p>
                        <p class="card-text">Genre: {{ $artist->genre }}</p>
                        <p class="card-text">Band Name: {{ $artist->band_name }}</p>
                        <p class="card-text">Instruments: {{ $artist->instrument }}</p>
                        @can('update', $artist)
                            <a href="{{ route('artist.edit', $artist->id) }}" class="btn btn-primary">Edit Profile</a>
                        @endcan
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

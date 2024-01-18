@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>List of Artists</h1>
        <div class="row">
            @foreach($artists as $artist)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        @if($artist->photo !== null)
                            <img src="{{ asset($artist->photo) }}" class="card-img-top" alt="Artist Image" style="max-width: 200px; max-height: 200px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $artist->name }}</h5>
                            <p class="card-text">{{ $artist->bio }}</p>
                            <a href="{{ route('artist.show', $artist->id) }}" class="btn btn-primary">View Profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

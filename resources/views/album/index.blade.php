@extends('layouts.app')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@section('content')
    <div class="container mt-4">
        <h2>All Albums</h2>
        <div class="row">
            @foreach($albums as $album)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($album->cover_image) }}" class="card-img-top" alt="Album Cover">
                        <div class="card-body">
                            <h5 class="card-title">{{ $album->title }}</h5>
                            <p class="card-text">{{ $album->description }}</p>
                            <a href="{{ route('album.show', $album->id) }}" class="btn btn-primary">View Album</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

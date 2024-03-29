@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="{{ $music->thumbnail ?? $music->album->cover_image ? 'col-md-9' : 'col-md-12' }}">
                        <h5 class="card-title">{{$music->title }}</h5>
                        <!-- Include the rest of the details -->
                        <hr>
                        <p class="card-text">Artist: {{ $music->artist->name }}</p>
                        <p class="card-text">Album: {{ $music->album->title }}</p>
                        <p class="card-text">Genre: {{ $music->genre }}</p>
                        <p class="card-text">Instrument: {{ $music->instrument }}</p>
                        <p class="card-text">Band Name: {{ $music->band_name }}</p>
                        <audio controls>
                            <source src="{{ asset($music->music_file) }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="mt-3">
                            @can('update', $music)
                                <a href="{{ route('music.edit', $music->id) }}" class="btn btn-primary">Edit</a>
                            @endcan
                            @can('delete', $music)
                                <form action="{{ route('music.destroy', $music->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this music?')">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                    @if($music->album->cover_image || $music->thumbnail)
                        <div class="col-md-3">
                            <img src="{{ asset($music->thumbnail ?? $music->album->cover_image) }}" alt="Album Cover Image" style="max-width: 100%;">
                            <p class="mt-2">Album Cover</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

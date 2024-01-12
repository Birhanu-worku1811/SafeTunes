@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">All Music</h1>
        <div class="row">
            @foreach($musics as $music)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if($music->thumbnail)
                            <img src="{{ asset($music->thumbnail) }}" class="card-img-top" alt="Music Image" style="max-height: 100px; max-width: 100px;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ Crypt::decrypt($music->title) }}</h5>
                            <p class="card-text"> by {{ $music->artist->name }}</p>
                            <audio controls preload="none" class="music-player">
                                <source src="{{ asset($music->music_file) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            <a href="{{ route('music.show', $music->id) }}" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Ensure only one audio player is playing at a time
        const players = document.querySelectorAll('.music-player');

        players.forEach(player => {
            player.addEventListener('play', event => {
                players.forEach(otherPlayer => {
                    if (otherPlayer !== event.target) {
                        otherPlayer.pause();
                    }
                });
            });
        });
    </script>
@endsection

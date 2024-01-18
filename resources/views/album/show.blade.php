@extends('layouts.app')


@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 mb-4">
                <img src="{{ asset($album->cover_image) }}" class="img-fluid" alt="Album Cover">
                @if($album->artist_id === Auth::user()->artist_id)
                    <div class="mt-3">
                        <a href="{{ route('album.edit', $album->id) }}" class="btn btn-primary">Edit Album</a>
                    </div>
                @endif
                <h2>{{ Crypt::decrypt($album->title) }}</h2>
                <p>{{ $album->description }}</p>
                <p class="card-text">by {{ $album->artist->name }}</p>
                <p class="card-text">Released {{ $album->created_at->diffForHumans() }}</p>
            </div>
            <div class="col-md-8">
                <h3>Tracks</h3>
                <ul>
                    @foreach($album->musics as $music)
                        <li>
                            <audio controls onplay="playAudio(event)">
                                <source src="{{ asset($music->music_file) }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            <a href="{{ route('music.show', $music->id) }}">{{ $music->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

<script>
    function playAudio(event) {
        const allAudios = document.querySelectorAll('audio');
        allAudios.forEach(audio => {
            if (audio !== event.target) {
                audio.pause();
            }
        });
    }
</script>

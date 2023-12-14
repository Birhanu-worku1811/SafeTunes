@extends("layouts.app")

@section("content")
    <div class="container mt-4">
        <h1 class="mb-4">Search Results for "{{ $search }}"</h1>

        <!-- Artists -->
        @if(!$artists->isEmpty())
            <h2>Artists</h2>
            <div class="row">
                @foreach($artists as $artist)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route("artist.show", $artist->id) }}"> <h5 class="card-title">{{ $artist->name }}</h5></a>
                                <h5 class="card-title">{{ $artist->bio }}</h5>
                                <h5 class="card-title">{{ $artist->genre }}</h5>
                                <h5 class="card-title">{{ $artist->band_name }}</h5>
                                <h5 class="card-title">{{ $artist->instrument}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Musics -->
        @if(!$musics->isEmpty())
            <h2>Musics</h2>
            <div class="row">
                @foreach($musics as $music)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route("music.show", $music->id) }}"> <h5 class="card-title">{{ $music->title }}</h5></a>
                                <h5 class="card-title">{{ $music->album }}</h5>
                                <h5 class="card-title">{{ $music->genre }}</h5>
                                <h5 class="card-title">{{ $music->instrument }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Albums -->
        @if(!$albums->isEmpty())
            <h2>Albums</h2>
            <div class="row">
                @foreach($albums as $album)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route("album.show", $album->id) }}"><h5 class="card-title">{{ $album->title }}</h5></a>
                                <h5 class="card-title">{{ $album->description }}</h5>
                                <h5 class="card-title">{{ $album->title }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

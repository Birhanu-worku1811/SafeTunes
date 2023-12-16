@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>News</h2>
                @foreach($news as $new)
                    <div class="card mb-3">
{{--                        <img src="{{ $new->image_path }}" class="card-img-top" alt="{{ $new->title }}">--}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $new->title }}</h5>
                            <p class="card-text">{{ $new->content }}</p>
                            <a href="{{ route('news.show', $new->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <h2>Albums</h2>
                @foreach($albums as $album)
                    <div class="card mb-3">
{{--                        <img src="{{ $album->cover_image }}" class="card-img-top" alt="Album Cover">--}}
                        <div class="card-body">
                            <h5 class="card-title">{{ ($album->title) }}</h5>
                            <a href="{{ route('album.show', $album->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h2>Musics</h2>
                @foreach($musics as $music)
                    <div class="card mb-3">
{{--                        <img src="{{ $music->cover_image }}" class="card-img-top" alt="music Cover">--}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $music->title }}</h5>
                            <a href="{{ route('music.show', $music->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <h2>Artists</h2>
                @foreach($artists as $artist)
                    <div class="card mb-3">
{{--                        <img src="{{ $artist->cover_image }}" class="card-img-top" alt="artist Cover">--}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $artist->title }}</h5>
                            <a href="{{ route('artist.show', $artist->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


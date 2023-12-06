@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>All News</h1>
        @if($news->isEmpty())
            <p>No news available.</p>
        @else
            <div class="row">
                @foreach($news as $singleNews)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset($singleNews->image_path) }}" class="card-img-top" alt="{{ $singleNews->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $singleNews->title }}</h5>
                                <p class="card-text">{{ $singleNews->content }}</p>
                                <!-- Additional details about news -->
                                <a href="{{ route('news.show', $singleNews->id) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

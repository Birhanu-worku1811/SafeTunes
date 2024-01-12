@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @if($news->image_path)
                        <div class="col-md-4">
                            <img src="{{ asset($news->image_path) }}" class="img-fluid" alt="News Image">
                        </div>
                    @endif
                    <div class="{{ $news->image_path ? 'col-md-8' : 'col-md-12' }}">
                        <h5 class="card-title">{{ $news->title }}</h5>
                        <p class="card-text">{{ $news->content }}</p>
                        <p class="card-text">Published Date: {{ $news->published_date }}</p>
                    </div>
                    <div class="col-md-12 text-md-end mt-3">
                        @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                            <form method="POST" action="{{ route('news.destroy', $news->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete News</button>
                            </form>
                            <form method="get" action="{{ route('news.edit', $news->id) }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-info">Edit News</button>
                            </form>
                        @endif
                        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">Back to News</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

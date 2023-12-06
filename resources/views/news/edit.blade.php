@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit News</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}" required>
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $news->content) }}</textarea>
                        @error('content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="published_date" class="form-label">Published Date</label>
                        <input type="date" class="form-control" id="published_date" name="published_date" value="{{ old('published_date', $news->published_date) }}" required>
                        @error('published_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @if($news->image_path)
                        <div class="mb-3">
                            <img src="{{ asset($news->image_path) }}" class="img-fluid img-thumbnail" alt="Current Image" style="max-width: 200px;">
                        </div>
                    @endif

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update News</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Create News</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="published_date">Published Date</label>
                        <input type="date" class="form-control" id="published_date" name="published_date" required>
                    </div>

                    <div class="form-group">
                        <label for="image_path">Upload Image</label>
                        <input type="file" class="form-control-file" id="image_path" name="image_path">
                    </div>

                    <button type="submit" class="btn btn-primary">Create News</button>
                </form>
            </div>
        </div>
    </div>
@endsection

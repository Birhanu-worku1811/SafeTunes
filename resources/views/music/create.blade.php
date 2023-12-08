@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Upload New Music</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('music.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
                        @error('title')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="album" class="form-label">Album</label>
                        <input type="text" class="form-control @error('album') is-invalid @enderror" id="album" name="album" required>
                        @error('album')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" name="genre" required>
                        @error('genre')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="instrument" class="form-label">Instrument</label>
                        <input type="text" class="form-control @error('instrument') is-invalid @enderror" id="instrument" name="instrument" required>
                        @error('instrument')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="band_name" class="form-label">Band Name</label>
                        <input type="text" class="form-control @error('band_name') is-invalid @enderror" id="band_name" name="band_name" required>
                        @error('band_name')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Album Cover Image</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" required onchange="previewImage(event)">
                        <img id="thumbnail" src="#" alt="Cover Image Preview" style="max-width: 200px; display: none;">
                        @error('thumbnail')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="music_file" class="form-label">Music File (Audio/Video)</label>
                        <input type="file" class="form-control @error('music_file') is-invalid @enderror" id="music_file" name="music_file" accept="audio/*" required>
                        @error('music_file')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Upload Music</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const img = document.getElementById('thumbnail');
            img.src = reader.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

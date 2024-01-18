@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Create New Album</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('album.update', $album->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ Crypt::decrypt($album->title)}}" required>
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ $album->description }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="release_date" class="form-label">Release Date</label>
                        <input type="date" class="form-control" id="release_date" name="release_date" value="{{ $album->release_date }}" required>
                        @error('release_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Album Cover Image</label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                        @error('cover_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            @if(config('services.recaptcha.key'))
                                <div
                                    class="g-recaptcha @error('g-recaptcha-response') is-invalid @enderror"
                                    data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                            @endif
                            @error('g-recaptcha-response')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>

{{--                    <div class="mb-3">--}}
{{--                        <label for="audio_files" class="form-label">Audio Files (Multiple)</label>--}}
{{--                        <input type="file" class="form-control" id="audio_files" name="audio_files[]" accept="audio/*" multiple>--}}
{{--                        @error('audio_files.*')--}}
{{--                        <span class="text-danger">{{ $message }}</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Album</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

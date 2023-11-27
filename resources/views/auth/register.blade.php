@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_artist" name="is_artist">
                                        <label class="form-check-label"
                                               for="is_artist">{{ __('I am an artist') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div id="artist-fields" style="display: none;">
                                <div class="row mb-3">
                                    <label for="genre"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Genre') }}</label>
                                    <div class="col-md-6">
                                        <input id="genre" type="text" class="form-control" name="genre">
                                        <!-- You can replace "text" input with a dropdown/select menu for predefined genres -->
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="biography"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Biography') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="biography" class="form-control" name="biography"
                                                  rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="band_name"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Band Name (if applicable)') }}</label>
                                    <div class="col-md-6">
                                        <input id="band_name" type="text" class="form-control" name="band_name">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="instruments"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Instruments') }}</label>
                                    <div class="col-md-6">
                                        <input id="instruments" type="text" class="form-control" name="instruments">
                                        <!-- You can replace "text" input with a multi-select or checkboxes for instruments -->
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Add script to show/hide additional fields when the checkbox is clicked
        document.addEventListener('DOMContentLoaded', function () {
            const checkbox = document.getElementById('is_artist');
            const artistFields = document.getElementById('artist-fields');

            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    artistFields.style.display = 'block';
                } else {
                    artistFields.style.display = 'none';
                }
            });
        });
    </script>
@endsection

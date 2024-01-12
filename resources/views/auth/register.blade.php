@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form id="registrationForm" method="POST" action="{{ route('register') }}">
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
                                        <input class="form-check-input" type="checkbox" id="is_artist" name="is_artist"
                                               value="1" {{ old('is_artist') ? 'checked' : '' }}>
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
                                        <input id="genre" type="text" class="form-control" name="genre"
                                               value="{{ old('genre') }}">
                                        <!-- You can replace "text" input with a dropdown/select menu for predefined genres -->
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="biography"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Biography') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="biography" class="form-control" name="bio"
                                                  rows="4">{{ old('bio') }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="band_name"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Band Name (if any)') }}</label>
                                    <div class="col-md-6">
                                        <input id="band_name" type="text" class="form-control" name="band_name"
                                               value="{{ old('band_name') }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="instruments"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Instruments') }}</label>
                                    <div class="col-md-6">
                                        <input id="instruments" type="text" class="form-control" name="instruments"
                                               value="{{ old('instruments') }}">
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
                            <div class="col col-md-4">
                                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha_token" class="form-control @error('g-recaptcha-response') is-invalid @enderror">
                                @if($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
{{--                            @if($errors->has('g-recaptcha-response'))--}}
{{--                                <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha2.site_key')}}"></div>--}}
{{--                            @endif--}}
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary g-recaptcha"
                                            data-sitekey="{{config('services.recaptcha.site_key')}}"
                                            data-callback='onSubmit'
                                            data-action='register'>
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
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const checkbox = document.getElementById('is_artist');
                const artistFields = document.getElementById('artist-fields');

                // Function to toggle artist fields visibility
                const toggleArtistFields = () => {
                    artistFields.style.display = checkbox.checked ? 'block' : 'none';
                };

                // Toggle artist fields on checkbox change
                checkbox.addEventListener('change', function () {
                    toggleArtistFields();
                });

                // Show artist fields if checkbox is checked on page load
                toggleArtistFields();
            });

            // Registration of user or artist
            document.addEventListener('DOMContentLoaded', function () {
                const registrationForm = document.getElementById('registrationForm');
                const isArtistCheckbox = document.getElementById('is_artist');

                isArtistCheckbox.addEventListener('change', function () {
                    if (this.checked) {
                        registrationForm.action = "{{ route('artist.register') }}";
                    } else {
                        registrationForm.action = "{{ route('register') }}";
                    }
                });
            });

            function onSubmit(token) {
                document.getElementById("registrationForm").submit();
            }
        </script>
{{--        @if($errors->has('g-recaptcha-response'))--}}
{{--            <script type="text/javascript">--}}
{{--                var onloadCallback = function() {--}}
{{--                    alert("grecaptcha is ready!");--}}
{{--                };--}}
{{--            </script>--}}
{{--        @endif--}}
    @endpush
@endsection

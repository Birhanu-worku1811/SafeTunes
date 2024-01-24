@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Contact Us</h2>
        <form action="{{ route('home.contact.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" placeholder="John Doe" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Your message here" name="message"></textarea>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

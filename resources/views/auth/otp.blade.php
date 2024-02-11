@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Enter OTP</div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('otp.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="otp" class="sr-only">OTP</label>
                                <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP" required autofocus>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Verify OTP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum tortor nec est iaculis, eu sollicitudin nunc ultrices.</p>
                <p>Fusce ac nisi libero. Nam in placerat libero. Proin ac urna sit amet erat faucibus efficitur. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec vitae tortor eget dui bibendum aliquet in vel ipsum.</p>
            </div>
            <div class="col-md-6">
                <!-- Add an image here -->
                <img src="{{ asset('img/artist.jpg') }}" alt="About Image" class="img-fluid">
            </div>
        </div>
    </div>
@endsection

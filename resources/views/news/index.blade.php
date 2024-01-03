@extends('layouts.app')

@section('content')
{{--    <div class="container mt-4">--}}
{{--        <h1>All News</h1>--}}
{{--        @if($news->isEmpty())--}}
{{--            <p>No news available.</p>--}}
{{--        @else--}}
{{--            <div class="row">--}}
{{--                @foreach($news as $singleNews)--}}
{{--                    <div class="col-md-4 mb-4">--}}
{{--                        <div class="card">--}}
{{--                            <img src="{{ asset($singleNews->image_path) }}" class="card-img-top" alt="{{ $singleNews->title }}">--}}
{{--                            <div class="card-body">--}}
{{--                                <h5 class="card-title">{{ $singleNews->title }}</h5>--}}
{{--                                <p class="card-text">{{ $singleNews->content }}</p>--}}
{{--                                <!-- Additional details about news -->--}}
{{--                                <a href="{{ route('news.show', $singleNews->id) }}" class="btn btn-primary">Read More</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}


<!-- Blog section -->
<section class="blog-section spad">
    <div class="container">
        <!-- Blog post -->
        <div class="blog-item">
            <img src="img/blog/1.jpg" alt="">
            <div class="blog-date">April 14, 2019</div>
            <h3>Top 10 best songs in April</h3>
            <div class="blog-meta">by <a href="">Alan Smith</a> in <a href="">Music</a></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
        </div>
        <!-- Blog post -->
        <div class="blog-item">
            <img src="img/blog/2.jpg" alt="">
            <div class="blog-date">April 14, 2019</div>
            <h3>Summer Festivals that you cannot miss</h3>
            <div class="blog-meta">by <a href="">Alan Smith</a> in <a href="">Music</a></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
        </div>
        <!-- Blog post -->
        <div class="blog-item">
            <img src="img/blog/3.jpg" alt="">
            <div class="blog-date">April 14, 2019</div>
            <h3>Michael Smith latest album is out now</h3>
            <div class="blog-meta">by <a href="">Alan Smith</a> in <a href="">Music</a></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
        </div>
        <div class="site-pagination">
            <a href="#" class="active">01.</a>
            <a href="#">02.</a>
            <a href="#">03.</a>
            <a href="#">04.</a>
        </div>
    </div>
</section>
<!-- Blog section end -->


@endsection

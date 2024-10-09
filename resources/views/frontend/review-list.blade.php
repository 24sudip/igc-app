<!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">TESTIMONIAL</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>TESTIMONIAL</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- reviews Start -->
<div id="rs-courses-2" class="rs-courses-2 sec-spacer">
    <div class="container">
        <div class="sec-title mb-50">
            <h2>TESTIMONIAL</h2>
        </div>
        <div class="row">
            @foreach ($reviews as $review)
            <div class="col-lg-4 col-md-6">
                <div class="cource-item">
                    <div class="cource-img">
                        <a href="#">
                            @if ($review->review_photo)
                                @if (file_exists(public_path('storage/review_photo/'.$review->review_photo)))
                                <img style="width:370px;height:270px;object-fit:cover;" src="{{ asset('storage/review_photo/'.$review->review_photo) }}" alt="review_photo">
                                @endif
                            @endif
                        </a>
                        <a class="image-link" href="#" title="Testimonial">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                    <div class="course-body">
                        <a href="#" class="course-category">{{ $review->company }}</a>
                        <h4 class="course-title"><a href="#">{{ $review->name }}</a></h4>
                        <div class="course-desc">
                            <p>
                                {{ $review->what_say }}
                            </p>
                        </div>
                        <a href="#" class="cource-btn">{{ $review->designation }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $reviews->links() }}
    </div>
</div>
<!-- reviews End -->
@endsection

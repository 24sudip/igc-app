<!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">SUCCESS STORY DETAIL</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>Success Story Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Team Single Start -->
<div class="rs-team-single pt-100">
    <div class="container">
        <div class="row team">
            <div class="col-lg-4 col-md-12">
                <div class="team-photo mobile-mb-40">
                    @if ($success_story->success_story_photo)
                        @if (file_exists(public_path('storage/success_story_photo/'.$success_story->success_story_photo)))
                        <img style="width:400px;height:370px;object-fit:cover;" src="{{ asset('storage/success_story_photo/'.$success_story->success_story_photo) }}" alt="success_story_photo">
                        @endif
                    @endif
                    <div class="team-icons">
                        <a href="#" title="facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" title="twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" title="google plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#" title="linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <h3 class="team-name">{{ $success_story->name }}</h3>
                <p class="team-title">
                    {{ $success_story->subject }}
                    <span>{{ $success_story->university }}</span>
                </p>
                <h5>Country</h5>
                <p>{{ $success_story->country }}</p>
                <h5>File Open Date</h5>
                <p>{{ date("Y-m-d h:i:sa", strtotime($success_story->file_open_date)) }}</p>
                <h5>Visa Grant Date</h5>
                <p>{{ date("Y-m-d h:i:sa", strtotime($success_story->visa_grant_date)) }}</p>
                <h5>Processing Duration</h5>
                <p>{{ $success_story->processing_duration }}</p>
                <h5>Story</h5>
                <p>{!! $success_story->story !!}</p>
            </div>
        </div>
    </div>
</div>
<!-- Team Single End -->
@endsection

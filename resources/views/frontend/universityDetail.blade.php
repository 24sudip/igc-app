<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">University Detail</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>University Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- university Detail Start -->
<div class="rs-team-single pt-100">
    <div class="container">
        <div class="row team">
            <div class="col-lg-4 col-md-12">
                <div class="team-photo mobile-mb-40">
                    @if ($university_detail->university_detail_photo)
                        @if (file_exists(public_path('storage/university_detail_photo/'.$university_detail->university_detail_photo)))
                        <img style="width:400px;height:370px;object-fit:cover;" src="{{ asset('storage/university_detail_photo/'.$university_detail->university_detail_photo) }}" alt="university_detail_photo">
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
                <h3 class="team-name">{{ $university_detail->university->name }}</h3>
                <p class="team-contact">
                    <i class="ml-15 fa fa-envelope-o"></i> {{ $university_detail->website }}
                </p>
                <p>
                    {!! $university_detail->about !!}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- university Detail End -->
@endsection

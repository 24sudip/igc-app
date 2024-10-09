<!-- Nothing worth having comes easy. - Theodore Roosevelt -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">{{ $user->role }} detail</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>{{ $user->role }} Single</li>
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
                    @if ($user->photo)
                        @if (file_exists(public_path('storage/profile_photo/'.$user->photo)))
                        <img style="width: 400px;height: 370px;object-fit:cover;" src="{{ asset('storage/profile_photo/'.$user->photo) }}" alt="profile_photo">
                        @else
                        <img style="width: 400px;height: 370px;object-fit:cover;" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                        @endif
                    @else
                    <img style="width: 400px;height: 370px;object-fit:cover;" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
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
                <h3 class="team-name">{{ $user->name }}</h3>
                <p class="team-title">
                    {!! $user->designation !!}
                </p>
                <p class="team-contact">
                    <i class="fa fa-mobile"></i>{{ $user->phone }}<i class="ml-15 fa fa-envelope-o"></i>{{ $user->email }}
                </p>
                <h5>Professional Experience</h5>
                <p>{!! $user->professional_experience !!}</p>
                <h5>Education</h5>
                <p>{!! $user->education !!}</p>
                <h5>Research</h5>
                <p>{!! $user->research !!}</p>
                <h5>Publication</h5>
                <p>{!! $user->publication !!}</p>
                <h5>Message</h5>
                <p>{!! $user->message !!}</p>
            </div>
        </div>
    </div>
</div>
<!-- Team Single End -->
@endsection

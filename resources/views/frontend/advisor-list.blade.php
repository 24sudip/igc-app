<!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">ADVISOR LIST</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>Advisor List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Team Start -->
<div id="rs-courses-2" class="rs-courses-2 sec-spacer">
    <div class="container">
        <div class="sec-title mb-50">
            <h2>ADVISOR LIST</h2>
        </div>
        <div class="row">
            @foreach ($advisors as $advisor)
            <div class="col-lg-4 col-md-6">
                <div class="cource-item">
                    <div class="cource-img">
                        <a href="#">
                            @if ($advisor->photo)
                                @if (file_exists(public_path('storage/profile_photo/'.$advisor->photo)))
                                <img style="width:370px;height:270px;object-fit:cover;" src="{{ asset('storage/profile_photo/'.$advisor->photo) }}" alt="profile_photo">
                                @else
                                <img style="width:370px;height:270px;object-fit:cover;" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                                @endif
                            @else
                            <img style="width:370px;height:270px;object-fit:cover;" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                            @endif
                        </a>
                        <a class="image-link" href="{{ route('user.detail', $advisor->id) }}" title="Advisor Detail">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                    <div class="course-body">
                        <a href="#" class="course-category">{{ $advisor->phone }}</a>
                        <h4 class="course-title"><a href="{{ route('user.detail', $advisor->id) }}">{{ $advisor->name }}</a></h4>
                        <div class="course-desc">
                            <p>
                                {!! $advisor->designation !!}
                            </p>
                        </div>
                        <a href="#" class="cource-btn">{{ $advisor->email }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- advisor End -->
@endsection

<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">MANAGEMENT LIST</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>Management List</li>
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
            <h2>MANAGEMENT TEAM</h2>
        </div>
        <div class="row">
            @foreach ($teams as $team)
            <div class="col-lg-4 col-md-6">
                <div class="cource-item">
                    <div class="cource-img">
                        <a href="#">
                            @if ($team->photo)
                                @if (file_exists(public_path('storage/profile_photo/'.$team->photo)))
                                <img style="width:370px;height:270px;object-fit:cover;" src="{{ asset('storage/profile_photo/'.$team->photo) }}" alt="profile_photo">
                                @else
                                <img style="width:370px;height:270px;object-fit:cover;" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                                @endif
                            @else
                            <img style="width:370px;height:270px;object-fit:cover;" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                            @endif
                        </a>
                        <a class="image-link" href="{{ route('user.detail', $team->id) }}" title="Team Detail">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                    <div class="course-body">
                        <a href="#" class="course-category">{{ $team->phone }}</a>
                        <h4 class="course-title"><a href="{{ route('user.detail', $team->id) }}">{{ $team->name }}</a></h4>
                        <div class="course-desc">
                            <p>
                                {!! $team->designation !!}
                            </p>
                        </div>
                        <a href="#" class="cource-btn">{{ $team->email }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->
@endsection

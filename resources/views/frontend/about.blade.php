<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">About Us</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Achievements Start -->
<div class="rs-history sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 rs-vertical-bottom mobile-mb-50">
                <a href="#">
                    @if ($about->achievements_photo)
                    <img style="width:600px;height:370px;object-fit:cover;" src="{{ asset('storage/achievements_photo/'.$about->achievements_photo) }}" alt="achievements_photo">
                    @endif
                </a>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-title">
                    <h2>OUR ACHIEVEMENT</h2>
                </div>
                <div class="about-desc">
                    <p>{!! $about->achievements !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Achievements End -->

<!-- Mission Start -->
<div class="rs-mission sec-color sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mobile-mb-50">
                <div class="abt-title">
                    <h2>OUR MISSION</h2>
                </div>
                <div class="about-desc">
                    <p>{!! $about->mission !!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mobile-mb-30">
                <a href="#">
                    @if ($about->mission_photo)
                    <img style="width:600px;height:370px;object-fit:cover;" src="{{ asset('storage/mission_photo/'.$about->mission_photo) }}" alt="mission_photo">
                    @endif
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Mission End -->

<!-- Vision Start -->
<div class="rs-vision sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mobile-mb-50">
                <div class="vision-img rs-animation-hover">
                    @if ($about->vission_photo)
                    <img style="width:600px;height:370px;object-fit:cover;" src="{{ asset('storage/vission_photo/'.$about->vission_photo) }}" alt="vission_photo">
                    @endif
                    <a class="popup-youtube rs-animation-fade" href="#" title="Video Icon">
                    </a>
                    <div class="overly-border"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-title">
                    <h2>OUR VISION</h2>
                </div>
                <div class="vision-desc">
                    <p>{!! $about->vission !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vision End -->

<!-- Facilitiy Start -->
<div class="rs-mission sec-color sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mobile-mb-50">
                <div class="abt-title">
                    <h2>OUR FACILITY</h2>
                </div>
                <div class="about-desc">
                    <p>{!! $about->facilities !!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mobile-mb-30">
                <a href="#">
                    @if ($about->facilities_photo)
                    <img style="width:600px;height:370px;object-fit:cover;" src="{{ asset('storage/facilities_photo/'.$about->facilities_photo) }}" alt="facilities_photo">
                    @endif
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Facilitiy End -->

<!-- Activity Start -->
<div class="rs-history sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 rs-vertical-bottom mobile-mb-50">
                <a href="#">
                    @if ($about->activities_photo)
                    <img style="width:600px;height:370px;object-fit:cover;" src="{{ asset('storage/activities_photo/'.$about->activities_photo) }}" alt="activities_photo">
                    @endif
                </a>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-title">
                    <h2>OUR ACTIVITY</h2>
                </div>
                <div class="about-desc">
                    <p>{!! $about->activities !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Activity End -->
@endsection

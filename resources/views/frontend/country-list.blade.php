<!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">COUNTRY LIST</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>Country List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Courses Start -->
<div id="rs-courses-2" class="rs-courses-2 sec-spacer">
    <div class="container">
        <div class="sec-title mb-50">
            <h2>OUR COUNTRY LIST</h2>
        </div>
        <div class="row">
            @foreach ($countries as $country)
            <div class="col-lg-4 col-md-6">
                <div class="cource-item">
                    <div class="cource-img">
                        <a href="#">
                            @if ($country->country_photo)
                                @if (file_exists(public_path('storage/country_photo/'.$country->country_photo)))
                                <img style="width:370px;height:270px;object-fit:cover;" src="{{ asset('storage/country_photo/'.$country->country_photo) }}" alt="country_photo">
                                @endif
                            @endif
                        </a>
                        <a class="image-link" href="{{ url('/country/details/'.$country->id.'/'.$country->slug) }}" title="Country Detail">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                    <div class="course-body">
                        <h4 class="course-title"><a href="{{ url('/country/details/'.$country->id.'/'.$country->slug) }}">{{ $country->name }}</a></h4>
                        <div class="course-desc">
                            <p>
                                {!! $country->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $countries->links() }}
    </div>
</div>
<!-- Courses End -->
@endsection

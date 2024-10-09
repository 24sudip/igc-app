<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!--Banner Section Start-->
<div class="rs-banner-section2">
    <img src="{{ asset('frontend_assets/images') }}/bg/bg3.jpg" alt="" />
    <div class="banner-inner">
        <div class="container">
            <div class="banner-text">
                <div class="sl-sub-title">Choose IGC</div>
                <h2 class="banner-title"><span>Live your dream</span>studying abroad</h2>
                <p style="color: white;">Whatever study abroad assistance you need,
                IGC provides the holistic support to help you study in
                USA, UK, Canada, Australia, and Europe</p>
                <div class="btn-area pt-20">
                    <a href="https://app.samscrm.co.uk/s/draym21YxvgZ5he6kP5E4JBDb" class="readon">PROFILE FREE ASSESSMENT</a>
                    <a href="https://student.samscrm.co.uk/#/login" class="readon">STUDENT PORTAL</a>
                </div>
            </div>
        </div>
    </div>
    <div class="animate">
            <div class="circle1">
                <img src="{{ asset('frontend_assets/images') }}/circle.png" alt="">
            </div>
            <div class="circle2">
                <img src="{{ asset('frontend_assets/images') }}/circle.png" alt="">
            </div>
    </div>
</div>
<!--Banner Section End-->

<!-- About Us Start -->
<div id="rs-about" class="rs-about sec-spacer">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>ABOUT US</h2>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about-img rs-animation-hover">
                    @if ($about->facilities_photo)
                    <img style="width: 570px;height: 430px;object-fit:cover;" src="{{ asset('storage/facilities_photo/'.$about->facilities_photo) }}" alt="facilities_photo">
                    @endif
                    <a class="popup-youtube rs-animation-fade" target="_blank" href="https://www.youtube.com/playlist?list=PLEulbLYHwxoJSmUXPW-72yKH-WC-o95lQ" title="Video Icon">
                    </a>
                    <div class="overly-border"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-desc">
                    <h3>
                        <a href="https://www.youtube.com/playlist?list=PLEulbLYHwxoJSmUXPW-72yKH-WC-o95lQ" target="_blank">
                            WELCOME TO IGC
                        </a>
                    </h3>
                </div>
                <div id="accordion" class="rs-accordion-style1">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h3 class="acdn-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Our Facilities
                            </h3>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                {!! $about->facilities !!}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h3 class="acdn-title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Our Mission
                            </h3>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                {!! $about->mission !!}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header mb-0" id="headingThree">
                            <h3 class="acdn-title collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Our Vision
                            </h3>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                {!! $about->vission !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us End -->

<!-- Countries Start -->
<div id="rs-courses" class="rs-courses sec-color sec-spacer">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>YOUR DESIRED COUNTRIES</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
                    @foreach ($countries as $country)
                    <div class="cource-item">
                        <div class="cource-img">
                            @if ($country->country_photo)
                                @if (file_exists(public_path('storage/country_photo/'.$country->country_photo)))
                                <img style="width:370px;height:270px;object-fit:cover;" src="{{ asset('storage/country_photo/'.$country->country_photo) }}" alt="country_photo">
                                @endif
                            @endif
                            <a class="image-link" href="{{ url('/country/details/'.$country->id.'/'.$country->slug) }}" title="Country Detail">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                        <div class="course-body pb-3">
                            <h4 class="course-title"><a href="{{ url('/country/details/'.$country->id.'/'.$country->slug) }}">{{ $country->name }}</a></h4>
                            <p>{!! $country->description !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Countries End -->

<!-- Success stories Start -->
<div id="rs-team" class="rs-team sec-color sec-spacer">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>STUDENT SUCCESS STORIES</h2>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
            @foreach ($success_stories as $success_story)
            <div class="team-item">
                <div class="team-img">
                    @if ($success_story->success_story_photo)
                        @if (file_exists(public_path('storage/success_story_photo/'.$success_story->success_story_photo)))
                        <img style="width: 370px; height: 430px; object-fit:cover;" src="{{ asset('storage/success_story_photo/'.$success_story->success_story_photo) }}" alt="success_story_photo">
                        @endif
                    @endif
                    <div class="normal-text">
                        <h3 class="team-name">{{ $success_story->name }}</h3>
                        <span class="subtitle">{{ $success_story->subject }}</span>
                    </div>
                </div>
                <div class="team-content">
                    <div class="overly-border"></div>
                    <div class="display-table">
                        <div class="display-table-cell">
                            <h3 class="team-name"><a href="{{ route('success.story.detail', $success_story->id) }}">{{ $success_story->name }}</a></h3>
                            <span class="team-title">{{ $success_story->university }}</span>
                            <p class="team-desc">{{ $success_story->country }}</p>
                            <div class="team-social">
                                <a href="#" class="social-icon"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Success stories End -->

<!-- Virtual tour Start -->
<div _ngcontent-vxm-c34="" id="rs-courses" class="rs-courses pt-30 pb-30 sec-color">
    <div _ngcontent-vxm-c34="" class="container-fluid">
        <div _ngcontent-vxm-c34="" class="sec-title-2 text-center">
            <h2 _ngcontent-vxm-c34="">VIRTUAL TOUR</h2>
        </div>
        <div _ngcontent-vxm-c34="" class="row">
            <div _ngcontent-vxm-c34="" class="col-xl-12">
                <div _ngcontent-vxm-c34="" class="row">
                    <div _ngcontent-vxm-c34="" class="col-xl-12">
                        <div _ngcontent-vxm-c34="" class="cource-item">
                            <iframe _ngcontent-vxm-c34="" id="evrFrame" width="100%" height="640" allowvr="yes" allow="xr-spatial-tracking;vr;gyroscope;accelerometer;fullscreen;" scrolling="no" allowfullscreen="true" frameborder="0" src="https://webobook.com/public/657ee4af5f06e1288d08eda2,en?ap=false&amp;si=true&amp;sm=false&amp;sp=true&amp;sfr=true&amp;sl=true&amp;sop=true&amp;" style="width: 100%; height: 640px; border: none; max-width: 100%;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Virtual Tour End-->

<!-- Events Start -->
<div id="rs-events" class="rs-events sec-spacer">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>OUR EVENTS</h2>
            <p>I feel the presence of the Almighty, who formed us in his own image, and the breath.</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
                    @foreach ($events as $event)
                    <div class="event-item">
                        <div class="event-img">
                            @if ($event->event_photo)
                                @if (file_exists(public_path('storage/event_photo/'.$event->event_photo)))
                                <img style="width:370px;height:240px;object-fit:cover;" src="{{ asset('storage/event_photo/'.$event->event_photo) }}" alt="event_photo">
                                @endif
                            @endif
                            <a class="image-link" href="#" title="Event">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                        <div class="events-details sec-color">
                            <div class="event-date">
                                <i class="fa fa-calendar"></i>
                                <span>{{ date('d M Y', strtotime($event->event_date)) }}</span>
                            </div>
                            <h4 class="event-title"><a href="#">{{ $event->title }}</a></h4>
                            <div class="event-meta">
                                <div class="event-time">
                                    <i class="fa fa-clock-o"></i>
                                    <span>{{ date('H:i:sa', strtotime($event->event_date)) }}</span>
                                </div>
                                <div class="event-location">
                                    <i class="fa fa-map-marker"></i>
                                    <span>{{ $event->venue }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Events End -->

<!-- Testimonial Start -->
<div id="rs-testimonial" class="rs-testimonial bg5 sec-spacer">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2 class="white-color">WHAT OUR STUDENTS SAY</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div  class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="2" data-md-device-nav="true" data-md-device-dots="true">
                    @foreach ($reviews as $review)
                    <div class="testimonial-item">
                        <div class="testi-img">
                            @if ($review->review_photo)
                                @if (file_exists(public_path('storage/review_photo/'.$review->review_photo)))
                                <img style="width:111px;height:113px;object-fit:cover;" src="{{ asset('storage/review_photo/'.$review->review_photo) }}" alt="review_photo">
                                @endif
                            @endif
                        </div>
                        <div class="testi-desc">
                            <h4 class="testi-name">{{ $review->name }}</h4>
                            <p>
                                {{ $review->what_say }}
                            </p>
                            <h4>{{ $review->company }}</h4>
                            <p>{{ $review->designation }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Blog Start-->
<div id="rs-products" class="rs-products sec-spacer sec-color">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>BLOGS</h2>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="4" data-md-device-nav="true" data-md-device-dots="true">
            @foreach ($blogs as $blog)
            <div class="product-item">
                <div class="product-img">
                    <a href="#">
                        @if ($blog->blog_photo)
                            @if (file_exists(public_path('storage/blog_photo/'.$blog->blog_photo)))
                            <img style="width:270px;height:270px;object-fit:cover;" src="{{ asset('storage/blog_photo/'.$blog->blog_photo) }}" alt="blog_photo">
                            @endif
                        @endif
                    </a>
                </div>
                <h4 class="product-title"><a href="{{ url('/blog/detail/'.$blog->id.'/'.$blog->slug) }}">{{ $blog->title }}</a></h4>
                <span class="product-price">{{ $blog->category->name }}</span>
                <div class="product-btn">
                    <a href="#">{{ $blog->publish_date }}</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="view-btn">
            <a href="{{ route('blog.list') }}">VIEW  ALL</a>
        </div>
    </div>
</div>
<!-- Blog End-->

<!-- Partner Start -->
<div id="rs-partner" class="rs-partner pt-70 pb-70">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <h2>PARTNERS</h2>
        </div>
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="80" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="4" data-ipad-device-nav="false" data-ipad-device-dots="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
            @foreach ($partners as $partner)
            <div class="partner-item">
                <a href="{{ $partner->website }}">
                    @if ($partner->partner_photo)
                        @if (file_exists(public_path('storage/partner_photo/'.$partner->partner_photo)))
                        <img style="width:158px;height:167px;object-fit:cover;" src="{{ asset('storage/partner_photo/'.$partner->partner_photo) }}" alt="partner_photo">
                        @endif
                    @endif
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Partner End -->
@endsection

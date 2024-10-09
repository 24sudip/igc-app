<!-- Slider Area Start -->
<div id="rs-slider" class="slider-overlay-2">
    <div id="home-slider">
        <!-- Item 1 -->
        <div class="item active">
            @if ($about->facilities_photo)
            <img style="width: 1920px;height: 820px;object-fit:cover;" src="{{ asset('storage/facilities_photo/'.$about->facilities_photo) }}" alt="facilities_photo">
            @endif
            <div class="slide-content">
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="container text-center">
                            <h1 class="slider-title" data-animation-in="fadeInLeft" data-animation-out="animate-out">
                                CHOOSE IGC
                            </h1>
                            <p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">
                                {!! $about->facilities !!}
                            </p>
                            <a href="https://app.samscrm.co.uk/s/draym21YxvgZ5he6kP5E4JBDb" class="sl-readmore-btn mr-30" data-animation-in="lightSpeedIn" data-animation-out="animate-out">PROFILE FREE ASSESSMENT</a>
                            <a href="https://student.samscrm.co.uk/#/login" class="sl-get-started-btn" data-animation-in="lightSpeedIn" data-animation-out="animate-out">STUDENT PORTAL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="item">
            @if ($about->activities_photo)
            <img style="width: 1920px;height: 820px;object-fit:cover;" src="{{ asset('storage/activities_photo/'.$about->activities_photo) }}" alt="activities_photo">
            @endif
            <div class="slide-content">
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="container text-center">
                            <h1 class="slider-title" data-animation-in="fadeInUp" data-animation-out="animate-out">LIVE YOUR DREAM</h1>
                            <p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">
                                {!! $about->activities !!}
                            </p>
                            <a href="https://app.samscrm.co.uk/s/draym21YxvgZ5he6kP5E4JBDb" class="sl-readmore-btn mr-30" data-animation-in="fadeInUp" data-animation-out="animate-out">PROFILE FREE ASSESSMENT</a>
                            <a href="https://student.samscrm.co.uk/#/login" class="sl-get-started-btn" data-animation-in="fadeInUp" data-animation-out="animate-out">STUDENT PORTAL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="item">
            @if ($about->mission_photo)
            <img style="width: 1920px;height: 820px;object-fit:cover;" src="{{ asset('storage/mission_photo/'.$about->mission_photo) }}" alt="mission_photo">
            @endif
            <div class="slide-content">
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="container text-center">
                            <h1 class="slider-title" data-animation-in="fadeInUp" data-animation-out="animate-out">STUDYING ABROAD</h1>
                            <p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">
                                {!! $about->mission !!}
                            </p>
                            <a href="https://app.samscrm.co.uk/s/draym21YxvgZ5he6kP5E4JBDb" class="sl-readmore-btn mr-30" data-animation-in="fadeInUp" data-animation-out="animate-out">PROFILE FREE ASSESSMENT</a>
                            <a href="https://student.samscrm.co.uk/#/login" class="sl-get-started-btn" data-animation-in="fadeInUp" data-animation-out="animate-out">STUDENT PORTAL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Slider Area End -->

<!-- Counter Up Section Start-->
<div class="rs-counter pt-100 pb-70 bg3 my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="counter-content">
                    <h2 class="counter-title">ACHEIVEMENTS</h2>
                    <div class="counter-text">
                        <p>{!! $about->achievements !!}</p>
                    </div>
                    <div class="counter-img rs-image-effect-shine">
                        <img style="width: 800px;height: 400px;object-fit:cover;" src="{{ asset('storage/achievements_photo/'.$about->achievements_photo) }}" alt="Counter Discussion">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mt-80">
                <div class="row">
                    <div class="col-md-6">
                        <div class="rs-counter-list">
                            <h2 class="counter-number plus">{{ $teams_num }}</h2>
                            <h4 class="counter-desc">Staff</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rs-counter-list">
                            <h2 class="counter-number plus">{{ $advisors_num }}</h2>
                            <h4 class="counter-desc">Advisors</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="rs-counter-list">
                            <h2 class="counter-number plus">{{ $student_count }}</h2>
                            <h4 class="counter-desc">STUDENTS</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rs-counter-list">
                            <h2 class="counter-number plus">{{ $success_count }}</h2>
                            <h4 class="counter-desc">Successful</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Down Section End -->

<!-- Contact Area start -->
<div class="contact-comment-section">
    <h3>Leave Comment</h3>
    <div id="form-messages"></div>
    <form id="contact-form" method="post" action="{{ route('store.contact') }}">
        @csrf
        <fieldset>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Subject *</label>
                        <input name="subject" id="subject" class="form-control" type="text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Message *</label>
                        <textarea cols="40" rows="10" id="message" name="message" class="textarea form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group mb-0">
                <input class="btn-send" type="submit" value="Submit Now">
            </div>
        </fieldset>
    </form>
</div>
<!-- Contact End -->

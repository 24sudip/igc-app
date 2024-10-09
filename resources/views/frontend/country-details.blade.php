<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Country Details Start -->
<div id="rs-about" class="rs-about sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="about-img rs-animation-hover">
                    @if ($country_detail->country_detail_photo)
                        @if (file_exists(public_path('storage/country_detail_photo/'.$country_detail->country_detail_photo)))
                        <img style="width:570px;height:430px;object-fit:cover;" src="{{ asset('storage/country_detail_photo/'.$country_detail->country_detail_photo) }}" alt="country_detail_photo">
                        @endif
                    @endif
                    <a class="popup-youtube rs-animation-fade" href="#" title="Video Icon">
                    </a>
                    <div class="overly-border"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-desc">
                    <h2>COUNTRY DETAIL</h2>
                    <p>{!! $country_detail->description !!}</p>
                </div>
                <div id="accordion" class="rs-accordion-style1">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h3 class="acdn-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ $country_detail->first_collapsible_description_title }}
                            </h3>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                {!! $country_detail->first_collapsible_description !!}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h3 class="acdn-title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                {{ $country_detail->second_collapsible_description_title }}
                            </h3>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                {!! $country_detail->second_collapsible_description !!}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header mb-0" id="headingThree">
                            <h3 class="acdn-title collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                {{ $country_detail->third_collapsible_description_title }}
                            </h3>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                {!! $country_detail->third_collapsible_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Country Details End -->
@endsection

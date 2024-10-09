<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">Contact</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>Cantact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- .breadcrumbs-inner end -->
</div>
<!-- Breadcrumbs End -->
<div _ngcontent-vxm-c26="" class="contact-page-section mt-30">
    <div _ngcontent-vxm-c26="" class="container-fluid">
        <div _ngcontent-vxm-c26="" id="googleMap" style="position: relative; overflow: hidden;">
            <div _ngcontent-vxm-c26="" style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                <div _ngcontent-vxm-c26="" class="gm-err-container">
                    <div _ngcontent-vxm-c26="" class="gm-err-content">
                        <div _ngcontent-vxm-c26="" class="gm-err-icon text-center">
                            <iframe _ngcontent-vxm-c26="" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14606.856756347004!2d90.3743007!3d23.7575694!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9ba95e09a69%3A0xbd9197dc85a93b58!2sIGC!5e0!3m2!1sen!2sbd!4v1668345191369!5m2!1sen!2sbd" width="100%" height="600" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border: 0;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    h4 {
        margin-bottom: 0;
        padding-bottom: 0;
    }
</style>
<div class="contact-page-section sec-spacer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center">Turn your study ambition into action with IGC</h4>
                <form action="{{ route('frontend.survey.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label"><h4>Name*</h4></label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><h4>Phone*</h4></label>
                            <input type="tel" class="form-control" name="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><h4>Email*</h4></label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><h4>Preferred Country*</h4></label>
                            <select class="form-control" name="country">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><h4>Preferred study level*</h4></label>
                            <input type="text" class="form-control" name="desired_level_of_education">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

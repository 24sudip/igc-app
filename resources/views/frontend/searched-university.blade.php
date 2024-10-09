<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- university list Start -->
<div id="rs-courses-2" class="rs-courses-2 sec-spacer">
    <div class="container">
        <div class="sec-title mb-50">
            <h2>SEARCHED UNIVERSITY LIST</h2>
        </div>
        <div class="row">
            @foreach ($universities as $university)
            <div class="col-lg-4 col-md-6">
                <div class="cource-item">
                    <div class="cource-img">
                        <a href="#">
                            @if ($university->university_logo)
                                @if (file_exists(public_path('storage/university_logo/'.$university->university_logo)))
                                <img style="width:370px;height:270px;object-fit:cover;" src="{{ asset('storage/university_logo/'.$university->university_logo) }}" alt="university_logo">
                                @endif
                            @endif
                        </a>
                        <a class="image-link" href="{{ route('university.detail.user', $university->id) }}" title="University Detail">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                    <div class="course-body">
                        <a href="#" class="course-category">{{ $university->country->name }}</a>
                        <h4 class="course-title"><a href="{{ route('university.detail.user', $university->id) }}">{{ $university->name }}</a></h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $universities->links() }}
    </div>
</div>
<!-- university list End -->
@endsection

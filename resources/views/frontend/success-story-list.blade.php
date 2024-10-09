<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">SUCCESS STORIES</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>SUCCESS STORIES</li>
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
            <h2>OUR SUCCESS STORIES</h2>
        </div>
        <div class="row">
            @foreach ($success_stories as $success_story)
            <div class="col-lg-4 col-md-6">
                <div class="cource-item">
                    <div class="cource-img">
                        <a href="#">
                            @if ($success_story->success_story_photo)
                                @if (file_exists(public_path('storage/success_story_photo/'.$success_story->success_story_photo)))
                                <img style="width: 370px; height: 270px; object-fit:cover;" src="{{ asset('storage/success_story_photo/'.$success_story->success_story_photo) }}" alt="success_story_photo">
                                @endif
                            @endif
                        </a>
                        <a class="image-link" href="{{ route('success.story.detail', $success_story->id) }}" title="Success Story Detail">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                    <div class="course-body">
                        <a href="#" class="course-category">{{ $success_story->subject }}</a>
                        <h4 class="course-title"><a href="{{ route('success.story.detail', $success_story->id) }}">{{ $success_story->name }}</a></h4>
                        <div class="course-desc">
                            <p>
                                {{ $success_story->university }}
                            </p>
                        </div>
                        <a href="#" class="cource-btn">{{ $success_story->country }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $success_stories->links() }}
    </div>
</div>
<!-- Courses End -->
@endsection

<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">blog post</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>blog post</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Blog Section Start Here -->
<div class="blog-page-area sec-spacer">
    <div class="container">
        @foreach ($blogs as $blog)
        <div class="row mb-50 blog-inner">
            <div class="col-lg-6 col-md-12">
                <div class="blog-images">
                    <a href="{{ url('/blog/detail/'.$blog->id.'/'.$blog->slug) }}">{{ $blog->title }}">
                        <i class="fa fa-link" aria-hidden="true"></i>
                        @if ($blog->blog_photo)
                            @if (file_exists(public_path('storage/blog_photo/'.$blog->blog_photo)))
                            <img style="width:555px;height:306px;object-fit:cover;" src="{{ asset('storage/blog_photo/'.$blog->blog_photo) }}" alt="blog_photo">
                            @endif
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                @php
                    $comment_count = App\Models\Comment::where('blog_id',$blog->id)->where('parent_id',null)->count();
                @endphp
                <div class="blog-content">
                    <div class="date">
                        <i class="fa fa-calendar-check-o"></i>{{ $blog->publish_date }}
                    </div>
                    <h4><a href="{{ url('/blog/detail/'.$blog->id.'/'.$blog->slug) }}">{{ $blog->title }}</a></h4>
                    <ul class="blog-meta">
                        <li class="time"><a href="#"><i class="fa fa-user-o"></i> Admin</a></li>
                        <li class="date"><i class="fa fa-comments-o"></i> {{ $comment_count }}</li>
                    </ul>
                    <p>{{ $blog->meta_description }}</p>
                    <a class="primary-btn" href="{{ url('/blog/detail/'.$blog->id.'/'.$blog->slug) }}">Read More</a>
                </div>
            </div>
        </div><!-- .blog-inner end -->
        @endforeach
    </div>
    {{ $blogs->links() }}
</div>
<!-- Blog End  -->
@endsection

<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">blog details</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>blog details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Blog Single Start Here -->
<div class="single-blog-details sec-spacer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="single-image">
                    @if ($blog->blog_photo)
                        @if (file_exists(public_path('storage/blog_photo/'.$blog->blog_photo)))
                        <img style="width:770px;height:350px;object-fit:cover;" src="{{ asset('storage/blog_photo/'.$blog->blog_photo) }}" alt="blog_photo">
                        @endif
                    @endif
                </div><!-- .single-image End -->
                <h5 class="top-title">{{ $blog->title }}</h5>
                <p>{!! $blog->description !!}</p>
                <div class="share-section">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 life-style">
                            <span class="author">
                                <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> Admin </a>
                            </span>
                            <span class="comment">
                                <a href="#">
                                    <i class="fa fa-commenting-o" aria-hidden="true"></i>{{ $comments->count() }}
                                </a>
                            </span>
                            <span class="date">
                                <i class="fa fa-calendar" aria-hidden="true"></i> {{ $blog->publish_date }}
                            </span>
                            <span class="cat">
                                <a href="#"><i class="fa fa-folder-o" aria-hidden="true"></i> {{ $blog->category->name }} </a>
                            </span>
                        </div>
                    </div>
                </div><!-- .share-section End -->

                <div class="author-comment">
                    <h3 class="title-bg">Recent Comments</h3>
                    <ul>
                        @foreach ($comments as $comment)
                        <li>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="image-comments">
                                        <img width="100%" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <span class="reply"> <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i>
                                         {{ $comment->created_at->format('M d Y') }}</span></span>
                                    <div class="dsc-comments">
                                        <p>Comment {{ $comment->id }}</p>
                                        <h4>{{ $comment->user->name }}</h4>
                                        <p>{{ $comment->subject }}</p>
                                        <p>{{ $comment->message }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                            @php
                                $reply = App\Models\Comment::where('parent_id', $comment->id)->get();
                            @endphp

                            @foreach ($reply as $rep)
                            <li>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <div class="image-comments"><img src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" class="w-100" alt="Blog Details photo"></div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <span class="reply"> <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $rep->created_at->format('M d Y') }}</span></span>
                                        <div class="dsc-comments">
                                            <p>Reply For Comment {{ $rep->parent_id }}</p>
                                            <h4>{{ $rep->subject }}</h4>
                                            <p>{{ $rep->message }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div><!-- .author-comment End -->
                <div class="leave-comments-area">
                    @auth
                    <form action="{{ route('store.comment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <fieldset>
                            <h4 class="title-bg">Leave Comments</h4>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input name="subject" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Your comment here...</label>
                                        <textarea cols="40" rows="10" name="message" class="textarea form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn-send" type="submit">Post Comment</button>
                            </div>
                        </fieldset>
                    </form>
                    @else
                    <h4 class="title-bg">To Add Comment You Need To Login First <a href="{{ route('login') }}">Login Here</a></h4>
                    @endauth
                </div><!-- .leave-comments-area end -->
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-area">
                    <div class="cate-box">
                        <h3 class="title">Categories</h3>
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <a href="{{ route('category.blog', $category->id) }}">{{ $category->name }} <span>({{ $category->blogs->count() }})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- .cate-box end -->
                </div><!-- .sidebar-area end -->
            </div>
        </div>
    </div>
</div>
<!-- Blog Single End  -->
@endsection

<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Reply Comment</h1>
        <hr>
        <form action="{{ route('reply.message') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $comment->id }}">
            <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
            <input type="hidden" name="blog_id" value="{{ $comment->blog_id }}">
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>User Name : </h4></label>
                    <code>
                        <h4>
                            {{ $comment->user->name }}
                        </h4>
                    </code>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Blog Title : </h4></label>
                    <code>
                        <h4>
                            {{ $comment->blog->title }}
                        </h4>
                    </code>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Subject : </h4></label>
                    <code>
                        <h4>
                            {{ $comment->subject }}
                        </h4>
                    </code>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Message : </h4></label>
                    <code>
                        <h4>
                            {{ $comment->message }}
                        </h4>
                    </code>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Subject</h4></label>
                    <input type="text" class="form-control" name="subject">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Message</h4></label>
                    <input type="text" class="form-control" name="message">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Reply Comment</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

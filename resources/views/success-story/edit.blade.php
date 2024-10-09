<!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Success Story</h1>
        <hr>
        <form action="{{ route('success.story.update', $success_story->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="">
                <div class="mb-3">
                    <label class="form-label"><h4>Name</h4></label>
                    <input type="text" class="form-control" name="name" value="{{ $success_story->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Subject</h4></label>
                    <input type="text" class="form-control" name="subject" value="{{ $success_story->subject }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>University</h4></label>
                    <input type="text" class="form-control" name="university" value="{{ $success_story->university }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Country</h4></label>
                    <input type="text" class="form-control" name="country" value="{{ $success_story->country }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>FileOpenDate</h4></label>
                    <input type="datetime-local" class="form-control" name="file_open_date" value="{{ $success_story->file_open_date }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>VisaGrantDate</h4></label>
                    <input type="datetime-local" class="form-control" name="visa_grant_date" value="{{ $success_story->visa_grant_date }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>ProcessingDuration</h4></label>
                    <input type="text" class="form-control" name="processing_duration" value="{{ $success_story->processing_duration }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Story</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="story" id="tinymceExample" rows="10">{{ $success_story->story }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Success Story Photo</h4></label>
                    <input type="file" class="form-control" name="success_story_photo">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $success_story->status == '1' ? 'checked' : '' }} name="status">
                    <label class="form-check-label" for="flexCheckChecked">
                        <h5>Status</h5>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <a href="{{ route('success.story.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

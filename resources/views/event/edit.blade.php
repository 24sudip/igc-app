<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Event</h1>
        <hr>
        <form action="{{ route('event.update', $event->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Title</h4></label>
                    <input type="text" class="form-control" name="title" value="{{ $event->title }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Event Date</h4></label>
                    <input type="datetime-local" class="form-control" name="event_date" value="{{ $event->event_date }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Venue</h4></label>
                    <input type="text" class="form-control" name="venue" value="{{ $event->venue }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Description</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="description" id="tinymceExample" rows="10">{{ $event->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Event Photo</h4></label>
                    <input type="file" class="form-control" name="event_photo">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $event->status == '1' ? 'checked' : '' }} name="status">
                    <label class="form-check-label" for="flexCheckChecked">
                        <h5>Status</h5>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <a href="{{ route('event.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

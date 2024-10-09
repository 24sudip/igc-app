<!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Add New Event</h1>
        <hr>
        <form action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Title</h4></label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Event Date</h4></label>
                    <input type="datetime-local" class="form-control" name="event_date">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Venue</h4></label>
                    <input type="text" class="form-control" name="venue">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Description</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="description" id="tinymceExample" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Event Photo</h4></label>
                    <input type="file" class="form-control" name="event_photo">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked name="status">
                    <label class="form-check-label" for="flexCheckChecked">
                        <h5>Status</h5>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
        <a href="{{ route('event.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

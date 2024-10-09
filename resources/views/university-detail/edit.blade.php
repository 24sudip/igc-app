<!-- Simplicity is an acquired taste. - Katharine Gerould -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit University Detail</h1>
        <hr>
        <form action="{{ route('university.detail.update', $university_detail->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>University</h4></label>
                    <select class="form-control js-example-basic-single form-select" name="university_id" data-width="100%">
                        <option value="">Select University</option>
                        @foreach ($universities as $university)
                        <option value="{{ $university->id }}" {{ $university_detail->university_id == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Website</h4></label>
                    <input type="text" class="form-control" name="website" value="{{ $university_detail->website }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>About</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="about" id="tinymceExample" rows="10">{{ $university_detail->about }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>University Detail Photo</h4></label>
                    <input type="file" class="form-control" name="university_detail_photo">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <a href="{{ route('university.detail.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

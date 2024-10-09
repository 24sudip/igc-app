<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Partner</h1>
        <hr>
        <form action="{{ route('partner.update', $partner->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Title</h4></label>
                    <input type="text" class="form-control" name="title" value="{{ $partner->title }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Website</h4></label>
                    <input type="text" class="form-control" name="website" value="{{ $partner->website }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Partner Photo</h4></label>
                    <input type="file" class="form-control" name="partner_photo">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $partner->status == '1' ? 'checked' : '' }} name="status">
                    <label class="form-check-label" for="flexCheckChecked">
                        <h5>Status</h5>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <a href="{{ route('partner.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Add New Partner</h1>
        <hr>
        <form action="{{ route('partner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Title</h4></label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Website</h4></label>
                    <input type="text" class="form-control" name="website">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Partner Photo</h4></label>
                    <input type="file" class="form-control" name="partner_photo">
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
        <a href="{{ route('partner.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

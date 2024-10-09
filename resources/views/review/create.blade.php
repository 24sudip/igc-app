<!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Add New Review</h1>
        <hr>
        <form action="{{ route('review.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Name</h4></label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Designation</h4></label>
                    <input type="text" class="form-control" name="designation">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Company</h4></label>
                    <input type="text" class="form-control" name="company">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>WhatSay</h4></label>
                    <textarea class="form-control" name="what_say" rows="6"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Review Photo</h4></label>
                    <input type="file" class="form-control" name="review_photo">
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
        <a href="{{ route('review.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

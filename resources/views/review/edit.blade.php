<!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Review</h1>
        <hr>
        <form action="{{ route('review.update', $review->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Name</h4></label>
                    <input type="text" class="form-control" name="name" value="{{ $review->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Designation</h4></label>
                    <input type="text" class="form-control" name="designation" value="{{ $review->designation }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Company</h4></label>
                    <input type="text" class="form-control" name="company" value="{{ $review->company }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>WhatSay</h4></label>
                    <textarea class="form-control" name="what_say" rows="6">{{ $review->what_say }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Review Photo</h4></label>
                    <input type="file" class="form-control" name="review_photo">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $review->status == '1' ?
                    'checked' : '' }} name="status">
                    <label class="form-check-label" for="flexCheckChecked">
                        <h5>Status</h5>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <a href="{{ route('review.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Review List</h1>
        <a href="{{ route('review.create') }}" class="btn btn-primary mb-3">Add New People's Review</a>
        <div class="page-content">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Company</th>
                                        <th>WhatSay</th>
                                        <th>Review Photo</th>
                                        <th>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                <h5>Status</h5>
                                            </label>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->designation }}</td>
                                        <td>{{ $review->company }}</td>
                                        <td>{{ $review->what_say }}</td>
                                        <td>
                                            @if ($review->review_photo)
                                                @if (file_exists(public_path('storage/review_photo/'.$review->review_photo)))
                                                <img height="80" src="{{ asset('storage/review_photo/'.$review->review_photo) }}" alt="review_photo">
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $review->status == '1' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('review.edit', $review->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('review.delete', $review->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

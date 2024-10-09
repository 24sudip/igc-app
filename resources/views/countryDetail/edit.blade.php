<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Country Details</h1>
        <hr>
        <form action="{{ route('country.detail.update', $country_detail->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Country Id</h4></label>
                    <select class="form-control" name="country_id">
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ $country_detail->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Description</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="description" id="tinymceExample" rows="10">{{ $country_detail->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>First Collapsible Description Title</h4></label>
                    <input type="text" class="form-control" name="first_collapsible_description_title" value="{{ $country_detail->first_collapsible_description_title }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>First Collapsible Description</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="first_collapsible_description" id="tinymceExample" rows="10">{{ $country_detail->first_collapsible_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Second Collapsible Description Title</h4></label>
                    <input type="text" class="form-control" name="second_collapsible_description_title" value="{{ $country_detail->second_collapsible_description_title }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Second Collapsible Description</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="second_collapsible_description" id="tinymceExample" rows="10">{{ $country_detail->second_collapsible_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Third Collapsible Description Title</h4></label>
                    <input type="text" class="form-control" name="third_collapsible_description_title" value="{{ $country_detail->third_collapsible_description_title }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Third Collapsible Description</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="third_collapsible_description" id="tinymceExample" rows="10">{{ $country_detail->third_collapsible_description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Country Detail Photo</h4></label>
                    <input type="file" class="form-control" name="country_detail_photo">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <a href="{{ route('country.detail.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

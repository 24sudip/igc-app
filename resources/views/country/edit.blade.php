<!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Country</h1>
        <hr>
        <form action="{{ route('country.update', $country->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Country Name</h4></label>
                    <input type="text" class="form-control" name="name" value="{{ $country->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Slug</h4></label>
                    <input type="text" class="form-control" name="slug" value="{{ $country->slug }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Description</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="description" id="tinymceExample" rows="10">{{ $country->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Country Photo</h4></label>
                    <input type="file" class="form-control" name="country_photo">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $country->status == '1' ? 'checked' : '' }} name="status">
                    <label class="form-check-label" for="flexCheckChecked">
                        <h5>Status</h5>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <a href="{{ route('country.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

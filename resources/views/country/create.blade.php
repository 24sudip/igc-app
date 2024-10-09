<!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Add New Country</h1>
        <hr>
        <form action="{{ route('country.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Country Name</h4></label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Slug</h4></label>
                    <input type="text" class="form-control" name="slug">
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
                    <label class="form-label"><h4>Country Photo</h4></label>
                    <input type="file" class="form-control" name="country_photo">
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
        <a href="{{ route('country.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

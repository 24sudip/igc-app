<!-- When there is no desire, all things are at peace. - Laozi -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit University</h1>
        <hr>
        <form action="{{ route('university.update', $university->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Country</h4></label>
                    <select class="form-control" name="country_id">
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ $university->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>University Name</h4></label>
                    <input type="text" class="form-control" name="name" value="{{ $university->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>University Logo</h4></label>
                    <input type="file" class="form-control" name="university_logo">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $university->status == '1' ? 'checked' : '' }} name="status">
                    <label class="form-check-label" for="flexCheckChecked">
                        <h5>Status</h5>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <a href="{{ route('university.index') }}" class="btn btn-success">Back To List</a>
    </div>
</div>
@endsection

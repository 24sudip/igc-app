<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Add New Survey</h1>
        <hr>
        <form action="{{ route('survey.store') }}" method="post">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Name</h4></label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Phone</h4></label>
                    <input type="tel" class="form-control" name="phone">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Email</h4></label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Country</h4></label>
                    <select class="form-control" name="country">
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Desired Level of Education</h4></label>
                    <input type="text" class="form-control" name="desired_level_of_education">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

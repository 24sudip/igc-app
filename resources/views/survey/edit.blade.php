<!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Survey</h1>
        <hr>
        <form action="{{ route('survey.update', $survey->id) }}" method="post">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Name</h4></label>
                    <input type="text" class="form-control" name="name" value="{{ $survey->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Phone</h4></label>
                    <input type="tel" class="form-control" name="phone" value="{{ $survey->phone }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Email</h4></label>
                    <input type="email" class="form-control" name="email" value="{{ $survey->email }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Country</h4></label>
                    <select class="form-control" name="country">
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->name }}" {{ $survey->country == $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Desired Level of Education</h4></label>
                    <input type="text" class="form-control" name="desired_level_of_education" value="{{ $survey->desired_level_of_education }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

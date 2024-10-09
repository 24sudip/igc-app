<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Blog Category</h1>
        <hr>
        <form action="{{ route('category.update', $category->id) }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label"><h4>Name</h4></label>
                <input class="form-control" type="text" name="name" value="{{ $category->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection

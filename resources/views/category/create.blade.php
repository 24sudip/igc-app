<!-- When there is no desire, all things are at peace. - Laozi -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Add New Blog Category</h1>
        <hr>
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label"><h4>Name</h4></label>
                <input class="form-control" type="text" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection

<!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Blog Category List</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add New Blog Category</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('blog.related', $category->id) }}" class="btn btn-warning">View Post</a>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('category.delete', $category->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

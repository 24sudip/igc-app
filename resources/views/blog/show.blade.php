<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('blog.index') }}" class="btn btn-success">Back</a>
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th scope="row">Category</th>
                    <td>{{ $blog->category->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Publish Date</th>
                    <td>{{ $blog->publish_date }}</td>
                </tr>
                <tr>
                    <th scope="row">Title</th>
                    <td>{{ $blog->title }}</td>
                </tr>
                <tr>
                    <th scope="row">Meta Description</th>
                    <td>{{ $blog->meta_description }}</td>
                </tr>
                <tr>
                    <th scope="row">Description</th>
                    <td>{!! $blog->description !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

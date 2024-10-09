<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Add New Blog</h1>
        <hr>
        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label"><h4>Category</h4></label>
                            <select type="text" class="form-control" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label"><h4>Publish Date</h4></label>
                            <input type="date" class="form-control" name="publish_date">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label"><h4>Title</h4></label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label"><h4>Slug(Url-Text)</h4></label>
                            <input type="text" class="form-control" name="slug">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Meta Description</h4></label>
                    <input type="text" class="form-control" name="meta_description">
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
                    <label class="form-label"><h4>Blog Photo</h4></label>
                    <input type="file" class="form-control" name="blog_photo">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked name="published">
                    <label class="form-check-label" for="flexCheckChecked">
                        <h5>Published</h5>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
        <div class="mb-3">
            <a href="{{ route('blog.index') }}" class="btn btn-success">Back To List</a>
        </div>
    </div>
</div>
@endsection

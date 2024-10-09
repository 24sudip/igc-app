<!-- Order your soul. Reduce your wants. - Augustine -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Blog</h1>
        <hr>
        <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label"><h4>Category</h4></label>
                            <select type="text" class="form-control" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label"><h4>Publish Date</h4></label>
                            <input type="date" class="form-control" name="publish_date" value="{{ $blog->publish_date }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label"><h4>Title</h4></label>
                            <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label"><h4>Slug(Url-Text)</h4></label>
                            <input type="text" class="form-control" name="slug" value="{{ $blog->slug }}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Meta Description</h4></label>
                    <input type="text" class="form-control" name="meta_description" value="{{ $blog->meta_description }}">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Description</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="description" id="tinymceExample" rows="10">{{ $blog->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        @if ($blog->blog_photo)
                            @if (file_exists(public_path('storage/blog_photo/'.$blog->blog_photo)))
                            <img height="80" src="{{ asset('storage/blog_photo/'.$blog->blog_photo) }}" alt="profile_photo">
                            @endif
                        @endif
                    </div>
                    <label class="form-label"><h4>Blog Photo</h4></label>
                    <input type="file" class="form-control" name="blog_photo">
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $blog->published == '1' ? 'checked' : '' }} name="published">
                    <label class="form-check-label" for="flexCheckChecked">
                        <h5>Published</h5>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
        <div class="mb-3">
            <a href="{{ route('blog.index') }}" class="btn btn-success">Back To List</a>
        </div>
    </div>
</div>
@endsection

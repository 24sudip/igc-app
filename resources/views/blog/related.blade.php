<!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Related Blog List</h1>
        <a href="{{ route('category.index') }}" class="btn btn-primary mb-3">Back To Category</a>
        <div class="page-content">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Meta Description</th>
                                        <th>Slug(Url-Text)</th>
                                        <th>Blog Photo</th>
                                        <th>Publish Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->meta_description }}</td>
                                        <td>{{ $blog->slug }}</td>
                                        <td>
                                            @if ($blog->blog_photo)
                                                @if (file_exists(public_path('storage/blog_photo/'.$blog->blog_photo)))
                                                <img height="80" src="{{ asset('storage/blog_photo/'.$blog->blog_photo) }}" alt="profile_photo">
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $blog->publish_date }}</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $blog->published == '1' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    <h5>Published</h5>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('blog.destroy', $blog->id) }}" method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Soft-Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

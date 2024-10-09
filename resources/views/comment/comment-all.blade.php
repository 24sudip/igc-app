<!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Comment List</h1>
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
                                        <th>Blog Title</th>
                                        <th>User Name</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $comment->blog->title }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->subject }}</td>
                                        <td>
                                            <a href="{{ route('admin.comment.reply', $comment->id) }}" class="btn btn-warning">Reply</a>
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

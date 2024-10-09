<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Contact Message</h1>
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
                                        <th>User Name</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_msg as $msg)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $msg->user->name }}</td>
                                        <td>{{ $msg->subject }}</td>
                                        <td>{{ $msg->message }}</td>
                                        <td>
                                            @if ($msg->status == 1)
                                            <span class="badge rounded-pill bg-success">Confirmed</span>
                                            @else
                                            <span class="badge rounded-pill bg-danger">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('contact.detail', $msg->id) }}" class="btn btn-warning"><i class="fa fa-envelope"></i></a>
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

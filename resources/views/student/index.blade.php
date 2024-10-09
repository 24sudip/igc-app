<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Enrollment Students</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('student.create') }}" class="btn btn-success">Enrollment New Student</a>
            <a href="{{ route('background.export') }}" class="btn btn-primary">Export Education Background</a>
            <a href="{{ route('score.export') }}" class="btn btn-primary">Export English Language Score</a>
            <a href="{{ route('job.export') }}" class="btn btn-primary">Export Job Detail</a>
            <a href="{{ route('where.apply.export') }}" class="btn btn-primary">Export Where To Apply</a>
            <a href="{{ route('student.export') }}" class="btn btn-primary">Export Personal Detail</a>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Student Id</th>
                                        <th>Submitted Date</th>
                                        <th>Name</th>
                                        <th>Mobile Phone</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->created_at->format('d M Y') }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>
                                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('student.invoice', $student->id) }}" class="btn btn-info" title="Download"><i data-feather="download"></i></a>
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

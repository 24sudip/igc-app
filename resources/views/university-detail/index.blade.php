<!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>University Details List</h1>
        <a href="{{ route('university.detail.create') }}" class="btn btn-primary mb-3">Add New University Detail</a>
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
                                        <th>University Name</th>
                                        <th>Website</th>
                                        <th>University Detail Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($university_details as $university_detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $university_detail->university->name }}</td>
                                        <td>{{ $university_detail->website }}</td>
                                        <td>
                                            @if ($university_detail->university_detail_photo)
                                                @if (file_exists(public_path('storage/university_detail_photo/'.$university_detail->university_detail_photo)))
                                                <img height="80" src="{{ asset('storage/university_detail_photo/'.$university_detail->university_detail_photo) }}" alt="university_detail_photo">
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('university.detail.show', $university_detail->id) }}" class="btn btn-success"><i class="fa fa-envelope"></i></a>
                                            <a href="{{ route('university.detail.edit', $university_detail->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('university.detail.delete', $university_detail->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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

<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>University List</h1>
        <a href="{{ route('university.create') }}" class="btn btn-primary mb-3">Add New University</a>
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
                                        <th>Country</th>
                                        <th>University Name</th>
                                        <th>University Logo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($universities as $university)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $university->country->name }}</td>
                                        <td>{{ $university->name }}</td>
                                        <td>
                                            @if ($university->university_logo)
                                                @if (file_exists(public_path('storage/university_logo/'.$university->university_logo)))
                                                <img height="80" src="{{ asset('storage/university_logo/'.$university->university_logo) }}" alt="university_logo">
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $university->status == '1' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('university.edit', $university->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('university.delete', $university->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

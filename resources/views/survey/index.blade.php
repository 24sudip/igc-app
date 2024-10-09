<!-- The only way to do great work is to love what you do. - Steve Jobs -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Survey List</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('survey.create') }}" class="btn btn-success">Add New Survey</a>
            <a href="{{ route('survey.export') }}" class="btn btn-primary">Export To Excel</a>
        </div>
        <form action="{{ route('survey.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label">Import xlsx file</label>
                <input type="file" name="import_file" class="form-control">
            </div>
            <button type="submit" class="btn btn-secondary">Upload</button>
        </form>
        <div class="page-content">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Submitted Date</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Desired Level of Education</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surveys as $survey)
                                    <tr>
                                        <td>{{ $survey->id }}</td>
                                        <td>{{ $survey->created_at->format('d M Y') }}</td>
                                        <td>{{ $survey->name }}</td>
                                        <td>{{ $survey->phone }}</td>
                                        <td>{{ $survey->email }}</td>
                                        <td>{{ $survey->country }}</td>
                                        <td>{{ $survey->desired_level_of_education }}</td>
                                        <td>
                                            <a href="{{ route('survey.edit', $survey->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('survey.delete', $survey->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

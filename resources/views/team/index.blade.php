<!-- Nothing worth having comes easy. - Theodore Roosevelt -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Team List</h1>
        <a href="{{ route('team.create') }}" class="btn btn-primary mb-3">Add New Team</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="14%">Name</th>
                    <th scope="col" width="14%">Designation</th>
                    <th scope="col" width="14%">Phone</th>
                    <th scope="col" width="15%">Email</th>
                    <th scope="col" width="14%">Photo</th>
                    <th scope="col" width="14%">Priority</th>
                    <th scope="col" width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                <tr>
                    <td width="14%">{{ $team->name }}</td>
                    <td width="14%">{!! $team->designation !!}</td>
                    <td width="14%">{{ $team->phone }}</td>
                    <td width="15%">{{ $team->email }}</td>
                    <td>
                        @if ($team->photo)
                            @if (file_exists(public_path('storage/profile_photo/'.$team->photo)))
                            <img height="80" src="{{ asset('storage/profile_photo/'.$team->photo) }}" alt="profile_photo">
                            @else
                            <img height="80" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                            @endif
                        @else
                        <img height="80" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                        @endif
                    </td>
                    <td width="14%">{{ $team->priority }}</td>
                    <td width="15%">
                        <a href="{{ route('team.edit', $team->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('team.show', $team->id) }}" class="btn btn-success"><i class="fa fa-envelope"></i></a>
                        <a href="{{ route('team.delete', $team->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

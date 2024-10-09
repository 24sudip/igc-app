<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Advisor List</h1>
        <a href="{{ route('advisor.create') }}" class="btn btn-primary mb-3">Add New Advisor</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="11%">Name</th>
                    <th scope="col" width="11%">Message</th>
                    <th scope="col" width="11%">Designation</th>
                    <th scope="col" width="11%">Phone</th>
                    <th scope="col" width="11%">Email</th>
                    <th scope="col" width="12%">Photo</th>
                    <th scope="col" width="11%">Priority</th>
                    <th scope="col" width="11%">Is Active</th>
                    <th scope="col" width="11%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($advisors as $advisor)
                <tr>
                    <td width="11%">{{ $advisor->name }}</td>
                    <td width="11%">{!! $advisor->message !!}</td>
                    <td width="11%">{!! $advisor->designation !!}</td>
                    <td width="11%">{{ $advisor->phone }}</td>
                    <td width="11%">{{ $advisor->email }}</td>
                    <td>
                        @if ($advisor->photo)
                            @if (file_exists(public_path('storage/profile_photo/'.$advisor->photo)))
                            <img height="80" src="{{ asset('storage/profile_photo/'.$advisor->photo) }}" alt="profile_photo">
                            @else
                            <img height="80" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                            @endif
                        @else
                        <img height="80" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                        @endif
                    </td>
                    <td width="11%">{{ $advisor->priority }}</td>
                    <td width="11%">
                        <input class="form-check-input" type="checkbox" {{ $advisor->is_active == 1 ? 'checked' : '' }} id="flexCheckChecked" name="is_active" value="1">
                    </td>
                    <td width="11%">
                        <a href="{{ route('advisor.edit', $advisor->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('advisor.show', $advisor->id) }}" class="btn btn-success"><i class="fa fa-envelope"></i></a>
                        <a href="{{ route('advisor.delete', $advisor->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No Advisor Data Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

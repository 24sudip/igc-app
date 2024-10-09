<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <td width="10%">Name</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td width="10%">Designation</td>
                    <td>{!! $user->designation !!}</td>
                </tr>
                <tr>
                    <td width="10%">Phone</td>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <td width="10%">Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td width="10%">Message</td>
                    <td>{!! $user->message !!}</td>
                </tr>
                <tr>
                    <td width="10%">Professional Experience</td>
                    <td>{!! $user->professional_experience !!}</td>
                </tr>
                <tr>
                    <td width="10%">Education</td>
                    <td>{!! $user->education !!}</td>
                </tr>
                <tr>
                    <td width="10%">Research</td>
                    <td>{!! $user->research !!}</td>
                </tr>
                <tr>
                    <td width="10%">Publication</td>
                    <td>{!! $user->publication !!}</td>
                </tr>
                <tr>
                    <td width="10%">Profile Photo</td>
                    <td>
                        @if ($user->photo)
                            @if (file_exists(public_path('storage/profile_photo/'.$user->photo)))
                            <img height="80" src="{{ asset('storage/profile_photo/'.$user->photo) }}" alt="profile_photo">
                            @else
                            <img height="80" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                            @endif
                        @else
                        <img height="80" src="{{ asset('storage/profile_photo/default_profile_photo.jpg') }}" alt="profile_photo">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td width="10%">Status</td>
                    <td>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" {{ $user->is_active == 1 ? 'checked' : '' }} id="flexCheckChecked" name="is_active" value="1">
                            <label class="form-check-label" for="flexCheckChecked">
                                <h5>Is Active</h5>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td width="10%">Priority</td>
                    <td>{{ $user->priority }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

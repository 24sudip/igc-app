<!-- Well begun is half done. - Aristotle -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-8 mt-4">
        <a href="{{ route('university.detail.index') }}" class="btn btn-success mb-4">Back</a>
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th scope="col">University Name</th>
                    <td>{{ $university_detail->university->name }}</td>
                </tr>
                <tr>
                    <th scope="col">About</th>
                    <td>{!! $university_detail->about !!}</td>
                </tr>
                <tr>
                    <th scope="row">Website</th>
                    <td>{{ $university_detail->website }}</td>
                </tr>
                <tr>
                    <th>University Detail Photo</th>
                    <td>
                        @if ($university_detail->university_detail_photo)
                            @if (file_exists(public_path('storage/university_detail_photo/'.$university_detail->university_detail_photo)))
                            <img height="80" src="{{ asset('storage/university_detail_photo/'.$university_detail->university_detail_photo) }}" alt="university_detail_photo">
                            @endif
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

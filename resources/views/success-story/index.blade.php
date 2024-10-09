<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Success Story List</h1>
        <a href="{{ route('success.story.create') }}" class="btn btn-primary mb-3">Add New Success Story</a>
        <div class="page-content">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>University</th>
                                        <th>Country</th>
                                        <th>FileOpenDate</th>
                                        <th>VisaGrantDate</th>
                                        <th>ProcessingDuration</th>
                                        <th>Story</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($success_stories as $success_story)
                                    <tr>
                                        <td>{{ $success_story->name }}</td>
                                        <td>{{ $success_story->subject }}</td>
                                        <td>{{ $success_story->university }}</td>
                                        <td>{{ $success_story->country }}</td>
                                        <td>{{ date("Y-m-d h:i:sa", strtotime($success_story->file_open_date)) }}</td>
                                        <td>{{ date("Y-m-d h:i:sa", strtotime($success_story->visa_grant_date)) }}</td>
                                        <td>{{ $success_story->processing_duration }}</td>
                                        <td>{!! $success_story->story !!}</td>
                                        <td>
                                            @if ($success_story->success_story_photo)
                                                @if (file_exists(public_path('storage/success_story_photo/'.$success_story->success_story_photo)))
                                                <img height="80" src="{{ asset('storage/success_story_photo/'.$success_story->success_story_photo) }}" alt="success_story_photo">
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $success_story->status == '1' ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('success.story.edit', $success_story->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('success.story.delete', $success_story->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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

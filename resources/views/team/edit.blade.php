@extends('admin.admin-dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>Edit New Team</h1>
            <hr>
            <form action="{{ route('team.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="mb-3">
                        <label class="form-label"><h4>Name</h4></label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Designation</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="designation" id="tinymceExample" rows="10">{{ $user->designation }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Phone</h4></label>
                        <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Email</h4></label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Message</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="message" id="tinymceExample" rows="10">{{ $user->message }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Professional Experience</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="professional_experience" id="tinymceExample" rows="10">{{ $user->professional_experience }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Education</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="education" id="tinymceExample" rows="10">{{ $user->education }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Research</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="research" id="tinymceExample" rows="10">{{ $user->research }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Publication</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="publication" id="tinymceExample" rows="10">{{ $user->publication }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Photo</h4></label>
                        <input type="file" class="form-control" name="photo">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" {{ $user->is_active == 1 ? 'checked' : '' }} id="flexCheckChecked" name="is_active" value="1">
                        <label class="form-check-label" for="flexCheckChecked">
                            <h5>Is Active</h5>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Priority</h4></label>
                        <input type="number" class="form-control" name="priority" value="{{ $user->priority }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('team.index') }}" class="btn btn-success">Back To List</a>
        </div>
    </div>
@endsection

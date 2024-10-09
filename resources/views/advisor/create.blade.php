<!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
@extends('admin.admin-dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1>Add New Advisor</h1>
            <hr>
            <form action="{{ route('advisor.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="mb-3">
                        <label class="form-label"><h4>Name</h4></label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Designation</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="designation" id="tinymceExample" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Phone</h4></label>
                        <input type="tel" class="form-control" name="phone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Email</h4></label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Message</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="message" id="tinymceExample" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Professional Experience</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="professional_experience" id="tinymceExample" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Education</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="education" id="tinymceExample" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Research</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="research" id="tinymceExample" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Publication</h4></label>
                        <div class="card">
                            <div class="card-body">
                                <textarea class="form-control" name="publication" id="tinymceExample" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Photo</h4></label>
                        <input type="file" class="form-control" name="photo">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" checked name="is_active">
                        <label class="form-check-label" for="flexCheckChecked">
                            <h5>Is Active</h5>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><h4>Priority</h4></label>
                        <input type="number" class="form-control" name="priority">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('advisor.index') }}" class="btn btn-success">Back To List</a>
        </div>
    </div>
@endsection

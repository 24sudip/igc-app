<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Enrollment Form</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('student.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <h4 style="text-decoration: underline;">Student Details</h4>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label"><h4>Name</h4></label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label"><h4>Mobile phone</h4></label>
                                <input type="tel" class="form-control" name="phone">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label"><h4>Email</h4></label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label"><h4>Date of Birth</h4></label>
                                <input type="date" class="form-control" name="date_of_birth">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label class="form-label"><h4>Address</h4></label>
                                <input type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <h4 style="text-decoration: underline;">Guardian Details</h4>
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label"><h4>Guardian Name</h4></label>
                                <input type="text" class="form-control" name="guardian_name">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label"><h4>Guardian Mobile phone</h4></label>
                                <input type="tel" class="form-control" name="guardian_phone">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label"><h4>Guardian Email</h4></label>
                                <input type="email" class="form-control" name="guardian_email">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label class="form-label"><h4>Guardian Relation</h4></label>
                                <input type="text" class="form-control" name="guardian_relation">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <h4 style="text-decoration: underline;">Any Education Gap?</h4>
                                <textarea type="text" class="form-control" name="education_gap" placeholder="If yes, please explain here..., Otherwise type No"></textarea>
                                <h5>After Creating Enrollment Please Go To Corresponding Edit Page To Add More Information</h5>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

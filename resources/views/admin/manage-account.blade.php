<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Manage your account</h1>
        <h2>Change your account settings</h2>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                  <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Email</button>
                  <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Password</button>
                  {{-- <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Two-factor authentication</button> --}}
                  <button class="nav-link" id="v-pills-extra1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-extra1" type="button" role="tab" aria-controls="v-pills-extra1" aria-selected="false">Personal Data</button>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <h3>Profile</h3>
                        <form action="{{ route('change.profile') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="mb-3">
                                    <label class="form-label"><h4>Username</h4></label>
                                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><h4>Phone Number</h4></label>
                                    <input type="tel" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                        <h3>Manage Email</h3>
                        <form action="{{ route('change.email') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="mb-3">
                                    <label class="form-label"><h4>New Email</h4></label>
                                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Change Email</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                        <h3>Change Password</h3>
                        <form action="{{ route('change.password') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="mb-3">
                                    <label class="form-label"><h4>Current password</h4></label>
                                    <input type="password" class="form-control" name="old_password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><h4>New password</h4></label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><h4>Confirm new password</h4></label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-primary">Update password</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
                        <h3>Two-factor authentication (2FA)</h3>
                        <h4>Authenticator app</h4>
                        <a href="#" class="btn btn-primary">Set up authenticator app</a>
                        <a href="#" class="btn btn-primary">reset authenticator app</a>
                    </div> --}}
                    <div class="tab-pane fade" id="v-pills-extra1" role="tabpanel" aria-labelledby="v-pills-extra1-tab" tabindex="0">
                        <h3>Personal Data</h3>
                        <p>Your account contains personal data that you have given us. This page allows you to download or delete that data.</p>
                        <h5>Deleting this data will permanently remove your account, and this cannot be recovered.</h5>
                        <a href="{{ route('profile.data') }}" class="btn btn-primary mb-3">Download</a>
                        <div>
                            <a href="{{ route('admin.delete') }}" class="btn btn-danger" id="delete">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

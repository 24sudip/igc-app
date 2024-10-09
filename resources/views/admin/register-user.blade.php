<!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <h1>Register</h1>
        <h2>Create A New Account</h2>
        <hr>
        <form action="{{ route('store.user') }}" method="post">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Name</h4></label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Email</h4></label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Password</h4></label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Confirm Password</h4></label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection

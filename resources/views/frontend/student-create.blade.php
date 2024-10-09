<!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Enrollment Form</h1>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endforeach
                    @endif
                    <form action="{{ route('frontend.student.store') }}" method="post">
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
                                    <textarea type="text" class="form-control mb-3" name="education_gap" placeholder="If yes, please explain here..., Otherwise type No"></textarea>
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
</x-app-layout>

<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Edit About</h1>
        <hr>
        <form action="{{ route('about.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label class="form-label"><h4>Mission</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="mission" id="tinymceExample" rows="10">{{ $about->mission }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Mission Photo</h4></label>
                    <input type="file" class="form-control" name="mission_photo">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Vission</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="vission" id="tinymceExample" rows="10">{{ $about->vission }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Vission Photo</h4></label>
                    <input type="file" class="form-control" name="vission_photo">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Achievements</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="achievements" id="tinymceExample" rows="10">{{ $about->achievements }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Achievements Photo</h4></label>
                    <input type="file" class="form-control" name="achievements_photo">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Facilities</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="facilities" id="tinymceExample" rows="10">{{ $about->facilities }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Facilities Photo</h4></label>
                    <input type="file" class="form-control" name="facilities_photo">
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Activities</h4></label>
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" name="activities" id="tinymceExample" rows="10">{{ $about->activities }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"><h4>Activities Photo</h4></label>
                    <input type="file" class="form-control" name="activities_photo">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <a href="{{ route('about.index') }}" class="btn btn-success">Back</a>
    </div>
</div>
@endsection

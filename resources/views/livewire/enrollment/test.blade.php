<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EducationBackground{{ $education_background->id }}" wire:click="edit_education_background({{ $education_background->id }})">
Edit
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="EducationBackground{{ $education_background->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Education Background</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            @if (session('BgUpdtMsg'))
                <div class="alert alert-success">
                    {{ session('BgUpdtMsg') }}
                </div>
            @endif
            <form wire:submit.prevent="education_background_update({{ $education_background->id }})">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><h4>Degree</h4></label>
                            <input type="text" class="form-control" wire:model="degree">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><h4>Subject</h4></label>
                            <input type="text" class="form-control" wire:model="subject">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><h4>Result</h4></label>
                            <input type="text" class="form-control" wire:model="result">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label"><h4>Passing Year</h4></label>
                            <input type="number" class="form-control" wire:model="passing_year">
                        </div>
                        <div class="col-lg-10 mb-3">
                            <label class="form-label"><h4>Name Of Institute</h4></label>
                            <input type="text" class="form-control" wire:model="name_of_institute">
                        </div>
                        <div class="col-lg-2 mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

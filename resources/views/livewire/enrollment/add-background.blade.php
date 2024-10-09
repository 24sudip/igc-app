{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<div class="basic-form">
    <form wire:submit.prevent="education_background_insert">
        <div class="form-group">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('BgAddMsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('BgAddMsg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <input type="hidden" wire:model.live="background_id">
                    <label class="form-label"><h4>Degree</h4></label>
                    <input type="text" class="form-control" wire:model="degree">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Subject</h4></label>
                    <input type="text" class="form-control" wire:model="subject">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Result</h4></label>
                    <input type="text" class="form-control" wire:model="result">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Passing Year</h4></label>
                    <input type="number" class="form-control" wire:model="passing_year">
                </div>
                <div class="col-lg-8">
                    <label class="form-label"><h4>Name Of Institute</h4></label>
                    <input type="text" class="form-control" wire:model="name_of_institute">
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary">Add</button>
                    @if ($background_id)
                    <button type="button" class="btn btn-secondary" wire:click="education_background_update({{ $background_id }})">Update</button>
                    <button type="button" class="btn btn-warning" wire:click="cancel_edit">CancelEdit</button>
                    @endif
                </div>
            </div>
        </div>
    </form>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Degree</th>
                <th scope="col">Subject</th>
                <th scope="col">Result</th>
                <th scope="col">Passing Year</th>
                <th scope="col">Name Of Institute</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($education_backgrounds as $education_background)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $education_background->degree }}</td>
                <td>{{ $education_background->subject }}</td>
                <td>{{ $education_background->result }}</td>
                <td>{{ $education_background->passing_year }}</td>
                <td>{{ $education_background->name_of_institute }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" wire:click="edit_education_background({{ $education_background->id }})">
                    Edit
                    </button>
                    <button type="button" class="btn btn-danger" wire:click="delete_background({{ $education_background->id }})" wire:confirm="Are you sure you want to delete this?">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

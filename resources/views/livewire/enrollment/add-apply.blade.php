{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<div class="basic-form">
    <form wire:submit.prevent="apply_insert">
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

            @if (session('WhrAplyMsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('WhrAplyMsg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <input type="hidden" wire:model.live="apply_id">
                    <label class="form-label"><h4>University</h4></label>
                    <input type="text" class="form-control" wire:model="university">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Program Level</h4></label>
                    <input type="text" class="form-control" wire:model="program_level">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Intake</h4></label>
                    <input type="text" class="form-control" wire:model="intake">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Subject</h4></label>
                    <input type="text" class="form-control" wire:model="subject">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Tution Fee</h4></label>
                    <input type="number" class="form-control" wire:model="tution_fee">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Application Fee</h4></label>
                    <input type="number" class="form-control" wire:model="application_fee">
                </div>
                <div class="col-lg-8">
                    <label class="form-label"><h4>Country</h4></label>
                    <input type="text" class="form-control" wire:model="country">
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary">Add</button>
                    @if ($apply_id)
                    <button type="button" class="btn btn-secondary" wire:click="apply_update({{ $apply_id }})">Update</button>
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
                <th scope="col">University</th>
                <th scope="col">Program Level</th>
                <th scope="col">Intake</th>
                <th scope="col">Subject</th>
                <th scope="col">Tution Fee</th>
                <th scope="col">Application Fee</th>
                <th scope="col">Country</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applies as $apply)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $apply->university }}</td>
                <td>{{ $apply->program_level }}</td>
                <td>{{ $apply->intake }}</td>
                <td>{{ $apply->subject }}</td>
                <td>{{ $apply->tution_fee }}</td>
                <td>{{ $apply->application_fee }}</td>
                <td>{{ $apply->country }}</td>
                <td>
                    <button type="button" class="btn btn-success" wire:click="edit_apply({{ $apply->id }})">Edit</button>
                    <button type="button" class="btn btn-danger" wire:click="delete_apply({{ $apply->id }})"
                        wire:confirm="Are you sure you want to delete this?">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

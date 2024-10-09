{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
<div class="basic-form">
    <form wire:submit.prevent="job_detail_insert">
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

            @if (session('JbDtlMsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('JbDtlMsg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <input type="hidden" wire:model.live="job_detail_id">
                    <label class="form-label"><h4>Company</h4></label>
                    <input type="text" class="form-control" wire:model="company">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Designation</h4></label>
                    <input type="text" class="form-control" wire:model="designation">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Duration</h4></label>
                    <input type="text" class="form-control" wire:model="duration">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Salary Type</h4></label>
                    <select type="text" class="form-control" wire:model="salary_type">
                        <option value="">Select Type</option>
                        <option value="Cash">Cash</option>
                        <option value="Bank">Bank</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary">Add</button>
                    @if ($job_detail_id)
                    <button type="button" class="btn btn-secondary" wire:click="job_update({{ $job_detail_id }})">Update</button>
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
                <th scope="col">Company</th>
                <th scope="col">Designation</th>
                <th scope="col">Duration</th>
                <th scope="col">Salary Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($job_details as $job_detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $job_detail->company }}</td>
                <td>{{ $job_detail->designation }}</td>
                <td>{{ $job_detail->duration }}</td>
                <td>{{ $job_detail->salary_type }}</td>
                <td>
                    <button type="button" class="btn btn-success" wire:click="edit_job({{ $job_detail->id }})">Edit</button>
                    <button type="button" class="btn btn-danger" wire:click="delete_job({{ $job_detail->id }})"
                        wire:confirm="Are you sure you want to delete this?">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

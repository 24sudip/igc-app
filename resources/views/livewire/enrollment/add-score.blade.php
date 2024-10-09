{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
<div class="basic-form">
    <form  wire:submit.prevent="score_insert">
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

            @if (session('ScoreMsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('ScoreMsg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <input type="hidden" wire:model.live="score_id">
                    <label class="form-label"><h4>Type</h4></label>
                    <input type="text" class="form-control"  wire:model="type">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Overall Score</h4></label>
                    <input type="number" step="0.1" class="form-control"  wire:model="overall_score">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Reading Score</h4></label>
                    <input type="number" step="0.1" class="form-control"  wire:model="reading_score">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Writing Score</h4></label>
                    <input type="number" step="0.1" class="form-control"  wire:model="writing_score">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Listening Score</h4></label>
                    <input type="number" step="0.1" class="form-control"  wire:model="listening_score">
                </div>
                <div class="col-lg-6">
                    <label class="form-label"><h4>Speaking Score</h4></label>
                    <input type="number" step="0.1" class="form-control"  wire:model="speaking_score">
                </div>
                <div class="col-lg-8">
                    <label class="form-label"><h4>Expire Date</h4></label>
                    <input type="date" class="form-control"  wire:model="expire_date">
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary">Add</button>
                    @if ($score_id)
                    <button type="button" class="btn btn-secondary" wire:click="score_update({{ $score_id }})">Update</button>
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
                <th scope="col">Type</th>
                <th scope="col">Overall Score</th>
                <th scope="col">Reading Score</th>
                <th scope="col">Writing Score</th>
                <th scope="col">Listening Score</th>
                <th scope="col">Speaking Score</th>
                <th scope="col">Expire Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($language_scores as $language_score)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $language_score->type }}</td>
                <td>{{ $language_score->overall_score }}</td>
                <td>{{ $language_score->reading_score }}</td>
                <td>{{ $language_score->writing_score }}</td>
                <td>{{ $language_score->listening_score }}</td>
                <td>{{ $language_score->speaking_score }}</td>
                <td>{{ date('d M Y', strtotime($language_score->expire_date)) }}</td>
                <td>
                    <button type="button" class="btn btn-success" wire:click="edit_score({{ $language_score->id }})">Edit</button>
                    <button type="button" class="btn btn-danger" wire:click="delete_score({{ $language_score->id }})"
                        wire:confirm="Are you sure you want to delete this?">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Partners List</h1>
        <a href="{{ route('partner.create') }}" class="btn btn-primary mb-3">Add New Partner</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Website</th>
                    <th scope="col">Partner Photo</th>
                    <th scope="col">
                        <label class="form-check-label" for="flexCheckChecked">
                            <h5>Status</h5>
                        </label>
                    </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($partners as $partner)
                <tr>
                    <td>{{ $partner->title }}</td>
                    <td>{{ $partner->website }}</td>
                    <td>
                        @if ($partner->partner_photo)
                            @if (file_exists(public_path('storage/partner_photo/'.$partner->partner_photo)))
                            <img height="80" src="{{ asset('storage/partner_photo/'.$partner->partner_photo) }}" alt="partner_photo">
                            @endif
                        @endif
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $partner->status == '1' ? 'checked' : '' }}>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('partner.edit', $partner->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('partner.delete', $partner->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No Partner Data Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

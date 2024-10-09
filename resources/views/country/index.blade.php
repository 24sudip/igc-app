<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Country List</h1>
        <a href="{{ route('country.create') }}" class="btn btn-primary mb-3">Add New Country</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Country Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col" width="50%">Description</th>
                    <th scope="col">Country Photo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($countries as $country)
                <tr>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->slug }}</td>
                    <td width="50%">{!! $country->description !!}</td>
                    <td>
                        @if ($country->country_photo)
                            @if (file_exists(public_path('storage/country_photo/'.$country->country_photo)))
                            <img height="80" src="{{ asset('storage/country_photo/'.$country->country_photo) }}" alt="country_photo">
                            @endif
                        @endif
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{ $country->status == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckChecked">
                                <h5>Is Active</h5>
                            </label>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('country.edit', $country->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('country.delete', $country->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No Country Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

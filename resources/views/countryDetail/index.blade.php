<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Country Details</h1>
        <a href="{{ route('country.detail.create') }}" class="btn btn-primary mb-3">Create New Country Detail</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" width="6%">Country</th>
                    <th scope="col" width="14%">Description</th>
                    <th scope="col" width="6%">First Collapsible Description Title</th>
                    <th scope="col" width="14%">First Collapsible Description</th>
                    <th scope="col" width="6%">Second Collapsible Description Title</th>
                    <th scope="col" width="14%">Second Collapsible Description</th>
                    <th scope="col" width="6%">Third Collapsible Description Title</th>
                    <th scope="col" width="14%">Third Collapsible Description</th>
                    <th scope="col" width="14%">Country Detail Photo</th>
                    <th scope="col" width="6%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($country_details as $country_detail)
                <tr>
                    <td width="6%">{{ $country_detail->country->name }}</td>
                    <td width="14%">{!! $country_detail->description !!}</td>
                    <td width="6%">{{ $country_detail->first_collapsible_description_title }}</td>
                    <td width="14%">{!! $country_detail->first_collapsible_description !!}</td>
                    <td width="6%">{{ $country_detail->second_collapsible_description_title }}</td>
                    <td width="14%">{!! $country_detail->second_collapsible_description !!}</td>
                    <td width="6%">{{ $country_detail->third_collapsible_description_title }}</td>
                    <td width="14%">{!! $country_detail->third_collapsible_description !!}</td>
                    <td width="14%">
                        @if ($country_detail->country_detail_photo)
                            @if (file_exists(public_path('storage/country_detail_photo/'.$country_detail->country_detail_photo)))
                            <img height="80" src="{{ asset('storage/country_detail_photo/'.$country_detail->country_detail_photo) }}" alt="country_detail_photo">
                            @endif
                        @endif
                    </td>
                    <td width="6%">
                        <a href="{{ route('country.detail.edit', $country_detail->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('country.detail.delete', $country_detail->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No Country Detail Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

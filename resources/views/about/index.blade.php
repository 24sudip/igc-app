<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
@extends('admin.admin-dashboard')

@section('content')
<table class="table table-striped table-bordered">
  <thead class="text-center">
    <tr>
      <th scope="col" width="19%">Mission</th>
      <th scope="col" width="19%">Vission</th>
      <th scope="col" width="19%">Achievements</th>
      <th scope="col" width="19%">Facilities</th>
      <th scope="col" width="19%">Activities</th>
      <th scope="col" width="5%">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td width="19%">{!! $about->mission !!}</td>
      <td width="19%">{!! $about->vission !!}</td>
      <td width="19%">{!! $about->achievements !!}</td>
      <td width="19%">{!! $about->facilities !!}</td>
      <td width="19%">{!! $about->activities !!}</td>
      <td width="5%"><a href="{{ route('about.edit') }}" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
    </tr>
    <tr>
      <td width="19%">
        @if ($about->mission_photo)
        <img height="100" src="{{ asset('storage/mission_photo/'.$about->mission_photo) }}" alt="mission_photo">
        @endif
      </td>
      <td width="19%">
        @if ($about->vission_photo)
        <img height="100" src="{{ asset('storage/vission_photo/'.$about->vission_photo) }}" alt="vission_photo">
        @endif
      </td>
      <td width="19%">
        @if ($about->achievements_photo)
        <img height="100" src="{{ asset('storage/achievements_photo/'.$about->achievements_photo) }}" alt="achievements_photo">
        @endif
      </td>
      <td width="19%">
        @if ($about->facilities_photo)
        <img height="100" src="{{ asset('storage/facilities_photo/'.$about->facilities_photo) }}" alt="facilities_photo">
        @endif
      </td>
      <td width="19%">
        @if ($about->activities_photo)
        <img height="100" src="{{ asset('storage/activities_photo/'.$about->activities_photo) }}" alt="activities_photo">
        @endif
      </td>
      <td width="5%">Click Above</td>
    </tr>
  </tbody>
</table>
@endsection

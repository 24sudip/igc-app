<!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1>Event List</h1>
        <a href="{{ route('event.create') }}" class="btn btn-primary mb-3">Add New Event</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" width="30%">Title</th>
                    <th scope="col" width="12%">Event Date</th>
                    <th scope="col" width="12%">Venue</th>
                    <th scope="col" width="30%">Event Photo</th>
                    <th scope="col" width="8%">
                        <label class="form-check-label" for="flexCheckChecked">
                            <h5>Status</h5>
                        </label>
                    </th>
                    <th scope="col" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                <tr>
                    <td width="30%">{{ $event->title }}</td>
                    <td width="12%">{{ date('m/d/Y H:i:sa', strtotime($event->event_date)) }}</td>
                    <td width="12%">{{ $event->venue }}</td>
                    <td width="30%">
                        @if ($event->event_photo)
                            @if (file_exists(public_path('storage/event_photo/'.$event->event_photo)))
                            <img height="80" src="{{ asset('storage/event_photo/'.$event->event_photo) }}" alt="event_photo">
                            @endif
                        @endif
                    </td>
                    <td width="8%">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckChecked" {{ $event->status == '1' ? 'checked' : '' }} name="status">
                        </div>
                    </td>
                    <td width="8%">
                        <a href="{{ route('event.edit', $event->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('event.delete', $event->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No Event Data Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

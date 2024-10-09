<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
@extends('frontend.frontend-dashboard')

@section('frontend_content')
<!-- Breadcrumbs Start -->
<div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
    <div class="breadcrumbs-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="page-title">OUR EVENTS</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li>Events</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Events Start -->
<div class="rs-events-2 sec-spacer">
    <div class="container">
        <div class="row space-bt30">
            @foreach ($events as $event)
            <div class="col-lg-6 col-md-12">
                <div class="event-item">
                    <div class="row rs-vertical-middle">
                        <div class="col-md-6">
                            <div class="event-img">
                                @if ($event->event_photo)
                                    @if (file_exists(public_path('storage/event_photo/'.$event->event_photo)))
                                    <img style="width:270px;height:300px;object-fit:cover;" src="{{ asset('storage/event_photo/'.$event->event_photo) }}" alt="event_photo">
                                    @endif
                                @endif
                                <a class="image-link" href="#" title="Event">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="event-content">
                                <div class="event-meta">
                                    <div class="event-date">
                                        <i class="fa fa-calendar"></i>
                                        <span>{{ date('d M Y', strtotime($event->event_date)) }}</span>
                                    </div>
                                    <div class="event-time">
                                        <i class="fa fa-clock-o"></i>
                                        <span>{{ date('H:i:sa', strtotime($event->event_date)) }}</span>
                                    </div>
                                </div>
                                <h3 class="event-title">
                                    <a href="#">
                                    {{ $event->title }}
                                    </a>
                                </h3>
                                <div class="event-location">
                                    <i class="fa fa-map-marker"></i>
                                    <span>{{ $event->venue }}</span>
                                </div>
                                <div class="event-desc">
                                    <p>
                                        {!! $event->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $events->links() }}
    </div>
</div>
<!-- Events End -->
@endsection

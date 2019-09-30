@extends('layouts.app')

@section('content')
<!-- header -->
<header class="masthead">
        <div class="container-fluid h-100 header-image">
            <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="" style="color: white">Events Page</h1>
                <p class="lead" style="color: white">Check out our events.</p>
            </div>
            </div>
        </div>
</header>
<!-- header -->
<div class="container-fluid">
    <!-- All events -->
    <div class="row">
            @foreach($events as $event)
            <div class="col-md-3" style="float:left" data-aos="fade-up">
                <div class="card shadow" style="width: 18rem; margin: 10px;">
                    <img class="card-img-top" src="{{ URL::to('/') }}/uploads/events/{{ $event->picture }}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{ str_limit($event->name, $limit = 20, $end = '...') }}</h5>
                    <p class="card-text">{{ str_limit($event->description, $limit = 30, $end = '...') }}</p>
                    <a href="event/detail/{{ $event->id }}" class="btn btn-danger">View Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    <!-- All events -->
</div>
@endsection
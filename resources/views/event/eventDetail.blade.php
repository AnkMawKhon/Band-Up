@extends('layouts.app')

@section('content')

<header class="masthead">
    <div class="container-fluid h-100 header-image" >
        <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="" style="color: white">Event Page</h1>
            <p class="lead" style="color: white">Join the Event if you are interested.</p>
        </div>
        </div>
    </div>
</header>
<!-- Success and Error -->
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif
<!-- Success and Error -->

<small style="color: gray;margin:10px;"><i class="far fa-folder"></i> Home / Event / {{ $event->name }}</small>
<!-- Page Content -->
<div class="container-fluid card">
<!-- Portfolio Item Heading -->
<h1 class="my-4">{{ $event->name }}
</h1>

<!-- Portfolio Item Row -->
<div class="row">
  <div class="col-md-6">
    <img class="img-fluid card shadow" src="{{ URL::to('/') }}/uploads/events/{{ $event->picture }}" alt="" style="border-radius: 20px;">
    <br>
    <form action="{{ route('event.join') }}">
    <input type="hidden" name="event_id" value="{{ $event->id }}">
      <button type="submit" class="btn btn-danger">Join the Event</button> <b><i class="far fa-calendar-alt"></i> Date: {{ $event->date }} </b>
    </form>
  </div>

  <div class="col-md-6">
    <br>
    <div class="">
      <div id="map" class="card shadow map-box"></div>
    </div>
  </div>
</div>
<!-- /.row -->
      
  <!-- Youtube -->
  @if($event->youtube)
  <br><iframe width="100%" height="600px" style="border-radius: 20px;" src="http://www.youtube.com/embed/{{$event->youtube}}" frameborder="0" allowfullscreen></iframe>
  @endif
  <!-- Youtube -->
  <br><br>
  <div class="col-md-12 card shadow" data-aos="fade-up">
    <h3 class="my-3"><span style="color:red;">What</span> We are doing</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ $event->description }}</p>
  </div>
  <br><br>
  <div class="col-md-12" data-aos="fade-up">
    <h3 class="my-3"><span style="color:red;">Joined</span>Users</h3>
    <!-- Joined Users -->
    <div class="row">
      @foreach($event->users as $user)
      <div class="col-md-3">
      <div class="card shadow" style="margin: 10px;">
          <img class="card-img-top img-fluid" src="{{ URL::to('/') }}/uploads/avatars/{{ $user->avatar }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">{{ $user->bio }}</p>
            <a href="{{ URL::to('/') }}/user/detail/{{ $user->id }}" class="btn btn-danger float-right">Check Detail</a>
          </div>
        </div>
      </div>
        @endforeach
    </div>
    <!-- Joined Users -->
  </div>
</div>
<!-- /.container -->


<script>
var event = {!! json_encode($event->toArray()) !!};
var map, infoWindow;
</script>
<script src="{{ asset('js/map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN8gOzTMRcSgcN3cscIN1zNNQAWGk9bu0&callback=initEvent"
async defer></script>
@endsection
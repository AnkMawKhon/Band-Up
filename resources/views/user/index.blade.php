@extends('layouts.app')

@section('content')
<!-- header -->
<header class="masthead">
        <div class="container-fluid h-100 header-image">
            <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="" style="color: white">All Users</h1>
                <p class="lead" style="color: white">This is all the registered users.</p>
            </div>
            </div>
        </div>
</header>
<!--header -->
      <br><br>
<!-- Users -->
<div class="col-md-12" data-aos="fade-up">
  <h3 class="my-3"><span style="color:red;">Registered</span>Users</h3>
  <div class="row">
    @foreach($users as $user)
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
</div>
<!-- Users -->
@endsection
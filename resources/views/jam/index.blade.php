@extends('layouts.app')

@section('content')
<!-- header -->
<header class="masthead">
    <div class="container-fluid h-100 header-image">
        <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
            <h1 class="" style="color: white">Jam Session Page</h1>
            <p class="lead" style="color: white">Check out others' Jamming skills.</p>
        </div>
        </div>
    </div>
</header>
<!-- header -->
    <div class="container-fluid">
            <!-- Jam Sessions -->
            <div class="container-fluid">
              <div class="row">
              @foreach($jams as $jam)
                <div class="col-sm-3" style="margin-top: 25px" data-aos="fade-up">
                    <div class="card shadow">
                      <div class="card-header jam-header">
                      <h5 id="jam_name"><a href="{{ URL::to('/') }}/user/detail/{{ $jam->user->id }}"><img src="{{ URL::to('/') }}/uploads/avatars/{{ $jam->user->avatar }}"  class="jam-image"> </a> {{ str_limit($jam->name, $limit = 20, $end = '...') }}</h5>
                      </div>
                      <div class="card-body">
                      <p>By <b><a href="#" class="">{{ $jam->user->name }}</a></b> <small href="#"> | Date: <b>{{ $jam->created_at->toDateString() }}</b></small></p>
                          <audio preload="auto" controls style="width: 230px">
                                  <source src="{{ URL::to('/') }}/uploads/jams/{{ $jam->src }}">
                          </audio>  
                      </div>
                      </div>
                </div>
              @endforeach
              </div>
            </div>
            <!-- Jam Sessions -->
    </div>
@endsection
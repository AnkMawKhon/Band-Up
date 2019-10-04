@extends('layouts.admin_app')

@section('content')
<!-- Success -->
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

    <!-- Page Content -->
    <div class="container card shadow">
        <!-- Page Heading -->
        <h1 class="my-4">Delete Jam Sessions
        </h1>
        <!-- Delete Jam Session -->
        @foreach($jams as $jam)
        <div class="row" data-aos="fade-up">
          <div class="col-sm-6" style="margin-top: 25px">
              <div class="card shadow">
                <div class="card-header" style="background:#2e2d2d;color:white">
                <h5 id="jam_name"><img src="{{ URL::to('/') }}/uploads/avatars/{{ $jam->user->avatar }}" style="width: 32px;height: 32px;float:right;border-radius: 50%">  {{ str_limit($jam->name, $limit = 20, $end = '...') }}</h5>
                </div>
                <div class="card-body">
                <p>By <b><a href="#" class="">{{ $jam->user->name }}</a></b> <small href="#"> | Date: <b>{{ $jam->created_at->toDateString() }}</b></small></p>
                    <audio preload="auto" controls style="width: 230px">
                            <source src="{{ URL::to('/') }}/uploads/jams/{{ $jam->src }}">
                    </audio>  
                </div>
                </div>
          </div>
          <div class="col-sm-6">
              <br><br>
              <h2>{{ $jam->name }}</h2>
              <h6>By {{ $jam->user->name }}</h6>
              <p>{{ $jam->des }}</p>
            <form action="{{ route('jam.remove') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $jam->id }}">
                <button class="btn-lg btn-danger">Delete</button>
            </form>
          </div>
        </div>
        <hr>
        @endforeach
        <!-- Delete Jam Sessions -->
      </div>
      <!-- /.container -->
@endsection

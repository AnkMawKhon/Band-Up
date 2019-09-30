@extends('layouts.app')

@section('content')
<header class="masthead">
        <div class="container-fluid h-100 header-image">
            <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="" style="color: white">User's Detail</h1>
                <p class="lead" style="color: white">Look at others' details.</p>
            </div>
            </div>
        </div>
</header>
<div class="container-fluid">
        <div class="row">
            <!-- Profile Image -->
            <div class="col-md-3" data-aos="fade-up">
                <div class="card shadow">
                        <img  class="img-fluid user-image" src="{{ URL::to('/') }}/uploads/avatars/{{ $user->avatar }}" >
                        <div class="card-body">
                            <h5 class="card-text">Name: <b>{{ $user->name }}</b></h5>
                        </div>
                </div>
            </div>
            <!-- Profile Image -->
            <div class="col-md-9"data-aos="fade-up">
                <div class="card shadow" style="margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-text">{{ $user->name }}'s <span  style="color: red;">Information.</span></h5><br>
                        <!-- Name and Email -->
                        <div class="form-group row">
                                <label for="username"  class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ $user->name }}" class="form-control" disabled>
                                </div>
                        </div>                       
                             <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" value="{{ $user->email }}" type="email" class="form-control" name="email" disabled>
                                    </div>
                            </div>
                            <!-- Name and Email -->
                    </div>
                </div>
                <!-- User's Bio -->
                <div class="card shadow" style="margin-top:10px;">
                        <div class="card-body">
                            <h5 class="card-text">{{ $user->name }}'s <span  style="color: red;">Bio</span></h5><br>
                            <textarea  name="bio" class="md-textarea form-control" rows="3" disabled>{{ $user->bio }}</textarea>
                            <br>
                        </div>
                </div>
                <!-- User's Bio -->
            </div>
            <div class="col-md-12" data-aos="fade-up">
                <div class="card shadow" style="margin-top:10px;">
                        <!-- Jam Session -->
                        <div class="card-body">
                            <h5 class="card-text">Jam <span  style="color: red;">Sessions</span></h5><br>
                            <div class="row">
                                    @foreach($jams as $jam)
                                        <div class="col-sm-3" style="margin-top: 25px" data-aos="fade-up">
                                            <div class="card shadow" style="margin-top: 10px">
                                            <div class="card-header jam-header">
                                            <h5 id="jam_name"><img src="{{ URL::to('/') }}/uploads/avatars/{{ $jam->user->avatar }}"  class="jam-image">  {{ str_limit($jam->name, $limit = 20, $end = '...') }}</h5>
                                            </div>
                                            <div class="card-body">
                                            <p>By <b><a href="#" class="">{{ $jam->user->name }}</a></b> <small href="#"> | Date: <b>{{ $jam->created_at->toDateString() }}</b></small></p>
                                                <audio preload="auto" controls style="width: 220px;">
                                                        <source src="{{ URL::to('/') }}/uploads/jams/{{ $jam->src }}">
                                                </audio>  
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                            </div>
                             <!-- Jam Session -->
                        </div>
                </div>
        

        </div>
    </div>
</div>
<script>
	CKEDITOR.replace( 'texteditor' );
</script>
@endsection

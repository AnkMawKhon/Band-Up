@extends('layouts.app')

@section('content')
<div style="height: 100px;">
    
</div>
<div class="container-fluid">
    <form action="{{ route('user.profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3" data-aos="fade-up">
                <!-- Profile Image -->
                <div class="card shadow">
                        <img id="blah" class="img-fluid user-image" src="{{ URL::to('/') }}/uploads/avatars/{{ $user->avatar }}">
                        <div class="card-body">
                            <h5 class="card-text">Change Your <span  style="color: red;">Profile Picture</span></h5><br>
                            <div class="upload-btn-wrapper" style="float:right">
                                    <button class="btn-upload btn-sm">Upload an Image</button>
                                    <input type="file"  name="avatar" onchange="readURL(this);" value="{{ $user->image }}"/>
                            </div>
                        </div>
                </div>
                <!-- Profile Image -->
            </div>
            <div class="col-md-9"data-aos="fade-up">
                <div class="card shadow" style="margin-top: 10px;">
                    <!-- Personal Information -->
                    <div class="card-body">
                        <h5 class="card-text">Change Your <span  style="color: red;">Information.</span></h5><br>
                        <div class="form-group row">
                                <label for="username"  class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                        </div>                       
                             <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" value="{{ $user->email }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                            </div>
                    </div>
                    <!-- Personal Information -->
                </div>
                <div class="card shadow" style="margin-top:10px;">
                        <!-- User's Bio -->
                        <div class="card-body">
                            <h5 class="card-text">Add a <span  style="color: red;">Bio</span></h5><br>
                            <textarea  name="bio" class="md-textarea form-control" rows="3">{{ $user->bio }}</textarea>
                            <br>
                            <button class="btn btn-success float-right">Update Data</button>
                        </div>
                        <!-- User's Bio -->
                </div>
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
                                            <h5 id="jam_name"><img src="{{ URL::to('/') }}/uploads/avatars/{{ $jam->user->avatar }}" class="jam-image">  {{ str_limit($jam->name, $limit = 20, $end = '...') }}</h5>
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
</form>
</div>
<script>
	CKEDITOR.replace( 'texteditor' );
</script>
<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection

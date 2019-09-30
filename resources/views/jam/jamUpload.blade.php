@extends('layouts.app')

@section('content')
<!-- header -->
<header class="masthead">
        <div class="container-fluid h-100" style="background: black;opacity: 0.7">
            <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="" style="color: white">Upload A Jam Session</h1>
                <p class="lead" style="color: white">Want others to see your skill?</p>
            </div>
            </div>
        </div>
</header>
<!-- header -->
<!-- Errors -->
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br> 
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
</div>
@endif
<!-- Errors -->
    <!-- Uploading Jam Information -->
    <div class="container" data-aos="fade-up">
        <form action="{{ route('jam.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card shadow" style="margin-top: 10px;">
                        <div class="card-body">
                            <h5 class="card-text">Upload a <span  style="color: red;">Jam Session.</span></h5><br>
                            <div class="form-group row">
                                    <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Jam Name') }}</label>
    
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                            </div>                       
                            <div class="form-group row">
                                <label for="audio" class="col-md-4 col-form-label text-md-right">{{ __('Audio') }}</label>
    
                                <div class="col-md-6">
                                    <input type="file" name="audio" required> 
                                    <br>
                                    <small style="color: red">Please Upload MP3/WAV files under 2MB.</small>                               
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="desciption"  class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                        <textarea id="messageArea" name="description" rows="7" class="form-control ckeditor" placeholder="Write your message.." required></textarea>
                                </div>
                        </div>  
                        <button type="submit" class="btn btn-danger float-right">Upload a Jam Session.</button>
                        </div>
                    </div>
        </form>
    </div>
    <!-- Uploading Jam Information -->

@endsection
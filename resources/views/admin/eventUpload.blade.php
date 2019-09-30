@extends('layouts.admin_app')

@section('content')
<!-- Success and Errors -->
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
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<!-- Success and Errors -->

<!-- Event Upload -->
    <div class="container" data-aos="fade-up">
        <form action="{{ route('event.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card shadow" style="margin-top: 10px;">
                        <div class="card-body">
                            <h5 class="card-text">Create an <span  style="color: red;">Event.</span></h5><br>
                            <div class="form-group row">
                                    <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Event Name') }}</label>
    
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                            </div>                       
                            <div class="form-group row">
                                <label for="audio" class="col-md-4 col-form-label text-md-right">{{ __('Event Picture') }}</label>
    
                                <div class="col-md-6">
                                    <input type="file" name="picture" required>                                
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="desciption"  class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                        <textarea id="messageArea" name="description" rows="7" class="form-control" placeholder="Write your message.." required></textarea>
                                </div>
                        </div>  
                        <div class="form-group row">
                          <label for="desciption"  class="col-md-4 col-form-label text-md-right">{{ __('Date Time') }}</label>

                          <div class="col-md-6">
                            <input type="datetime-local" name="date" class="form-control">
                          </div>
                        </div>  
                        <div class="form-group row">
                                <label for="desciption"  class="col-md-4 col-form-label text-md-right">{{ __('Map') }}</label>

                            <div class="col-md-6">
                                <div id="map" style="height: 400px;background:black;"></div>
                            </div>
                        </div>
                        <input type="hidden" name="lat" id="lat" value=0 class="form-control form-control-user @error('lat') is-invalid @enderror">

                        <input type="hidden" name="lng" id="lng" value=0 class="form-control form-control-user @error('lng') is-invalid @enderror">
                        
                        <div class="form-group row">
                                <label for="youtube"  class="col-md-4 col-form-label text-md-right">{{ __('Youtube Link (optional)') }}</label>

                            <div class="col-md-6">
                                    <input type="text" name="youtube" class="form-control">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger float-right">Upload an Event.</button>
                        </div>
                    </div>
        </form>
    </div>
<!-- Event Upload -->

    <script src="{{ asset('js/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN8gOzTMRcSgcN3cscIN1zNNQAWGk9bu0&callback=initMap"
    async defer></script>


  
@endsection
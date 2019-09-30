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

<!-- Admin Upload -->
    <div class="container" data-aos="fade-up">
        <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="card shadow" style="margin-top: 10px;">
                        <div class="card-body">
                            <h5 class="card-text">Create an <span  style="color: red;">Admin.</span></h5><br>
                            <div class="form-group row">
                                    <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Admin Name') }}</label>
    
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" >
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Admin Email') }}</label>
    
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" >
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="name"  class="col-md-4 col-form-label text-md-right">{{ __('Admin Password') }}</label>
    
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control" >
                                    </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger float-right">Add an Admin.</button>
                        </div>
                    </div>
        </form>
    </div>
<!-- Admin Upload -->

    <script src="{{ asset('js/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAN8gOzTMRcSgcN3cscIN1zNNQAWGk9bu0&callback=initMap"
    async defer></script>


  
@endsection
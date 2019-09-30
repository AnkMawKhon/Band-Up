@extends('layouts.app')
@section('content')
<div style="height: 100px;">

</div>
<div class="container" style="text-align: center">
    <h1><i class="fas fa-music"></i>&nbsp;BAND <span style="color:red">UP</span></h1>
    <center>
    <div class="card shadow" data-aos="fade-up" style="width: 70rem;">
        <div class="card-body">
        <h5 class="card-title">Website <span style="color: red">Evaluation</span></h5>
        <h6 class="card-subtitle mb-2 text-muted">"Band Up" website</h6>
        <p class="card-text">"Band Up" website was created using Laravel MVC framework, and different plugins were used for the functions of the website. Before developing the website, the developers have little to no MVC knowledge, and this project has taught them a lot. The website has potential of being successful if handled with care. It provides a solution for a problem among the musicians, who wants to go to music specific events. There were some limitation in relation to time given, and resources available, but the website has all the features needed for a music event website. For future development, new features such as search function, google login, and video uploading should be considered. For reference, the following are the plugins and APIs that were used by the website.</p>
        </div>
    </div>  
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card shadow" style="width: 18rem;" data-aos="fade-up">
                    <img src="https://www.bram.us/wordpress/wp-content/uploads/2016/08/68747470733a2f2f7333322e706f7374696d672e6f72672f6b7476743539686f6c2f616f735f6865616465722e706e67.png" class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title">Animated on Scroll</h5>
                        <p class="card-text">An easy to use Scroll animation library.</p>
                        <a href="https://michalsnik.github.io/aos/" class="btn btn-danger">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card shadow" style="width: 18rem;" data-aos="fade-up">
                    <img src="https://www.gstatic.com/images/branding/product/2x/maps_512dp.png" class="card-img-top" style="width:200px">
                    <div class="card-body">
                        <h5 class="card-title">Google Maps</h5>
                        <p class="card-text">Maps and Geolocation API</p>
                        <a href="https://www.google.com/maps" class="btn btn-danger">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card shadow" style="width: 18rem;" data-aos="fade-up">
                    <img src="https://madewithnetwork.ams3.cdn.digitaloceanspaces.com//spatie-space-production/1553/socialite.jpg" class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title">Socialite</h5>
                        <p class="card-text">An easy to use Social Login Library.</p>
                        <a href="https://github.com/laravel/socialite" class="btn btn-danger">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                    <div class="card shadow" style="width: 18rem;" data-aos="fade-up">
                        <img src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-social.png" class="card-img-top" >
                        <div class="card-body">
                            <h5 class="card-title">Bootstrap</h5>
                            <p class="card-text">A responsive library for building websites.</p>
                            <a href="https://getbootstrap.com/docs/4.0/layout/grid/" class="btn btn-danger">Go somewhere</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </center>
</div>  
@endsection
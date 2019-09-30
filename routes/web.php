<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Auth::routes();


/* All the admin routes */
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/upload', 'AdminController@adminUpload')->name('admin.upload');
    Route::post('/upload', 'AdminController@adminCreate')->name('admin.upload.create');
    Route::get('/jam/delete', 'AdminController@jamDelete')->name('jam.delete');
    Route::post('/jam/delete', 'AdminController@jamRemove')->name('jam.remove');
    Route::get('/event/upload', 'AdminController@eventUpload')->name('event.upload');
    Route::post('/event/upload', 'AdminController@eventCreate')->name('event.upload.create');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

/* facebook Socialite routes */
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook.login');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback')->name('facebook.login.callback');

/* All the User Routes */
Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@update')->name('user.profile.update');
    Route::get('/detail/{id}', 'UserController@userDetail')->name('user.detail');
});

/* All the Jam Routes */
Route::prefix('jam')->group(function() {
    Route::get('/', 'JamController@index')->name('jam.index');
    Route::get('/upload', 'JamController@upload')->name('jam.upload');
    Route::post('/upload', 'JamController@create')->name('jam.upload.create');
});

/* All the Event Routes */
Route::prefix('event')->group(function() {
    Route::get('/event/join', 'EventController@eventJoin')->name('event.join');
    Route::get('/detail/{id}', 'EventController@eventDetail')->name('event.detail');
    Route::get('/', 'EventController@index')->name('event.index');
});

Route::get('skills', function() {
    return ['1', '2', '3'];
});
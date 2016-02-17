<?php

Route::get('/', function() {
	return view('pages.home');
});

// Pages for flyers route
Route::group(['middleware' => ['web']], function() {
	Route::resource('flyers', 'FlyersController');
});

Route::get('{zip}/{street}', 'FlyersController@show');

Route::post('{zip}/{street}/photos', 'FlyersController@addPhoto');
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

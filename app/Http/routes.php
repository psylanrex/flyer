<?php

Route::get('/', 'PagesController@home');

// Pages for flyers route
// Route::group(['middleware' => ['web']], function() {
// 	Route::resource('flyers', 'FlyersController');
// });




Route::group(['middleware' => ['web']], function () {

	Route::resource('flyers', 'FlyersController');

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('{zip}/{street}', 'FlyersController@show');

	Route::post('{zip}/{street}/photos', 'FlyersController@addPhoto');
});


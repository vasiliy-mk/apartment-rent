<?php


Route::pattern('id','\d+');
Route::pattern('params','active|to_slider|to_menu');


get('test', function(){


});


// Authentication routes...
get('auth/login', 'Auth\AuthController@getLogin');
post('auth/login', 'Auth\AuthController@authenticate');
get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
//get('auth/register', 'Auth\AuthController@getRegister');
//post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
get('password/email', 'Auth\PasswordController@getEmail');
post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
get('password/reset/{token}', 'Auth\PasswordController@getReset');
post('password/reset', 'Auth\PasswordController@postReset');


get('/','HomeController@index');
get('install','InstallController@index');
post('install/database','InstallController@database');



get('apartment/{id}/{slug?}','ApartmentController@show');

get('map','MapController@index');

get('contacts','ContactController@index');
post('contact/store','ContactController@store');

get('reviews','ReviewController@index');
post('review/store','ReviewController@store');


//get('auth/login',function(){echo 'Login page';});

// admin area
Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    get('dashboard','DashboardController@index');
    get('apartments','ApartmentController@adminIndex');
    get('apartment/create','ApartmentController@create');
    get('apartment/{id}/edit','ApartmentController@edit');
    post('apartment/{id}/update','ApartmentController@update');
    post('apartment/{id}/{param}/activate','ApartmentController@activate');

    post('apartment/store','ApartmentController@store');
    post('apartment/uploader','ApartmentController@uploader');
    post('apartment/{id}/destroy','ApartmentController@destroy');

    get('amenities','AmenityController@index');
    get('amenity/create','AmenityController@create');
    get('amenity/{id}/edit','AmenityController@edit');
    post('amenity/store','AmenityController@store');
    post('amenity/{id}/update','AmenityController@update');
    post('amenity/{id}/{param}/activate','AmenityController@activate');
    post('amenity/{id}/destroy','AmenityController@destroy');
    post('amenity/sort','AmenityController@sort');

    get('reviews','ReviewController@adminIndex');
    get('review/create','ReviewController@create');
    get('review/{id}/edit','ReviewController@edit');
    post('review/store','ReviewController@adminStore');
    post('review/{id}/update','ReviewController@update');
    post('review/{id}/{param}/activate','ReviewController@activate');
    post('review/action','ReviewController@action');
    post('review/{id}/destroy','ReviewController@destroy');

    get('pages','PageController@index');
    get('page/create','PageController@create');
    get('page/{id}/edit','PageController@edit');
    post('page/{id}/update','PageController@update');
    post('page/{id}/{param}/activate','PageController@activate');
    post('page/store','PageController@store');
    post('page/action','PageController@action');
    post('page/{id}/destroy','PageController@destroy');
    post('page/uploader','PageController@uploader');
    post('page/sort','PageController@sort');
    post('page/chekuniqueslug','PageController@chekUniqueSlug');


    get('settings','SettingsController@index');
    post('settings/update','SettingsController@update');


});
get('/{slug}','PageController@show');

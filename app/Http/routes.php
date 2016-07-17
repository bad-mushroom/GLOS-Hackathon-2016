<?php

// --- Public Routes

// Main page
Route::get('/', function () {
    return view('landing'); // temporary - will handle via controller
});

// --- API

/**
 * Technically this API is available to third party apps. For the sake of time
 * we're not going to authenticate at the app level and just assume all
 * requests are from us.
 */
Route::group(['prefix' => 'api', 'namespace' => 'Api'], function() {

    // Return a list of available dashboards
    Route::get('dashboards', 'Dashboards@index');

    // Return a specific dashboard config
    Route::get('dashboards/{dashboard?}', 'Dashboards@show');
});

// --- Account Auth/Registration

// User Authentication
Route::get('user/login', 'Auth\AuthController@getLogin');
Route::post('user/login', 'Auth\AuthController@postLogin');

Route::get('user/logout', 'Auth\AuthController@getLogout');

// Account Registration
Route::get('user/register', 'Auth\AuthController@getRegister');
Route::post('user/register', 'Auth\AuthController@postRegister');

// Password reset request
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// --- Authenticated Routes

Route::get('user', ['middleware' => 'auth', function() {
    // redirect to /user/login for now
}]);
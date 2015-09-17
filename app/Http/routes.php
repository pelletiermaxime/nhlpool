<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Login/Logout Routes
|--------------------------------------------------------------------------
|
*/
Route::get('login', [
    'as' => 'user_login',
    'uses' => 'SocialLoginController@login',
]);

Route::get('login/{type}', [
    'as' => 'do_login',
    'uses' => 'SocialLoginController@doLogin',
]);

Route::get('logged-in/{type}', [
    'as' => 'user_logged',
    'uses' => 'SocialLoginController@logged_in',
]);

Route::get('logout', [
    'as' => 'user_logout',
    'uses' => 'SocialLoginController@logout',
]);

Route::resource('pool', 'FrontendPoolController');

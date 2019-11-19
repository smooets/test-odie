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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$router->group(['as' => 'google::', 'namespace' => 'Auth\Google'], function() use ($router) {
    $router->get('/redirect', 'SocialAuthGoogleController@redirect');
    $router->get('/callback', 'SocialAuthGoogleController@callback');
});

$router->group(['as' => 'facebook::', 'namespace' => 'Auth\Facebook'], function() use ($router) {
    $router->get('/facebook-redirect', 'SocialAuthFacebookController@redirect');
    $router->get('/facebook-callback', 'SocialAuthFacebookController@callback');
});
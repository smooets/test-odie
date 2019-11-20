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


$router->group(['middleware' => 'auth'], function() use ($router) {
    $router->get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
    $router->get('/show/{id}', ['as' => 'home.show', 'uses' => 'HomeController@show']);
    $router->get('/buy/{id}', ['as' => 'home.buy', 'uses' => 'HomeController@buyItem']);
    
    $router->get('/cart', ['as' => 'cart', 'uses' => 'CartController@index']);
});

$router->group(['as' => 'google::', 'namespace' => 'Auth\Google'], function() use ($router) {
    $router->get('/redirect', 'SocialAuthGoogleController@redirect');
    $router->get('/callback', 'SocialAuthGoogleController@callback');
});

$router->group(['as' => 'facebook::', 'namespace' => 'Auth\Facebook'], function() use ($router) {
    $router->get('/facebook-redirect', 'SocialAuthFacebookController@redirect');
    $router->get('/facebook-callback', 'SocialAuthFacebookController@callback');
});

$router->get('/filter', [
    'as' => 'filter.index',
    'uses' => 'FilterController@index',
    'middleware' => 'auth'
]);
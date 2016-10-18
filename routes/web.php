<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// CLOUSURES o FUNCIONS ANÒNIMES -> passem la funció function com a parametre
// sense declarar-la ni posar-li nom.

Route::get('/', function () {
    return view('welcome');
});

//Auth::loginUsingId(4);
Auth::logout();

Route::get('/home', 'HomeController@index');
Route::get('/login', 'LoginController@showLoginForm');
Route::post('/login', 'LoginController@login');
Route::get('/register', 'RegisterController@register');

//Route::get('/register', function () {
//    return view('auth.register');
//});


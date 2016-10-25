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

use App\User;

Route::get('/', function () {
    return view('welcome');
});

// PAS 1 -> PROTEGIR PAGINES -> Middleware Auth

//$user = User::findOrFail(1);
//setcookie('user',$user->token);

// CONTAINER: app -> objecte que conté tota l'aplicació Laravel

Route::group(['middleware' => 'manualauth'], function () {
    Route::get('/tasques', function ()
    {
        // Uses Auth Middleware
        return view('tasques');
    });
});

Route::get('/login', function ()    {
    // Uses Auth Middleware
    return view('login');
});

////Auth::loginUsingId(4);
//Auth::logout();
//
//Route::get('/home', 'HomeController@index');
//Route::get('/login', 'LoginController@showLoginForm');
//Route::post('/login', 'LoginController@login');
//Route::get('/register', 'RegisterController@register');
//
////Route::get('/register', function () {
////    return view('auth.register');
////});


<?php


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



// PAS 2 -> LOGIN

Route::get('/login', 'LoginController@showLoginForm');
Route::post('/login', 'LoginController@login');


////Auth::loginUsingId(4);
//Auth::logout();
//
//Route::get('/home', 'HomeController@index');

//Route::get('/register', 'RegisterController@register');
//
////Route::get('/register', function () {
////    return view('auth.register');
////});


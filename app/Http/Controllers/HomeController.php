<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {

        return view('home');

    }

    private function setUserCookie() {
        $user = User::findOrFail(1);
        setcookie('user',$user->token);
    }


    private function getUser(){
            //Opció 4 : Client amb Cookie
            $token = $_COOKIE['user'];
            return User::where(["token" => $token])->first();
    }

}

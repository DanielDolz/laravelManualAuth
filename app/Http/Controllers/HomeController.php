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
        // S SOLID -> SINGLE RESPONSABILITY PRINCIPLE (SRP)

        // Passos controlador bàsic (glue entre model i vista)
        // 1) Aconseguir informació de l'usuari de la base de dades
        // 2) Mostrar vista home passant info del usuari

            $this->setUserCookie();

            // ESTAT SESSIÓ
            if ($this->userIsAuthenticated()){
                $user = $this->getUser();
                return view('home')
                    ->withUser($user);
            } else {
                return redirect('login');
            }

            // SINTAXI LITERAL -> definim l'objecte en JS (guardant-lo
            //                    en un string mitjançant JSON)
            // '{"name" : "Dani", "sn1" : "Dolz"}';

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

    private function userIsAuthenticated()
    {
            // Operador ternari (el mateix que el if/else de baix)
            return isset($_COOKIE['user']) ? true : false;

//            if (isset($_COOKIE['user'])) {
//                return true;
//            } else {
//                return false;
//            }
    }


}

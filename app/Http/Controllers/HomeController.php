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
        $user = User::find(1);
        setcookie('user',json_encode($user));
    }


    private function getUser(){

            //Opció 4 : Client amb Cookie
            $user = json_decode($_COOKIE['user']);
            return $user;

    }

    private function userIsAuthenticated()
    {
            if (isset($_COOKIE['user'])) {
                return true;
            } else {
                return false;
            }
    }


}

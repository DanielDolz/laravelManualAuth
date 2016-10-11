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

    private function getUser(){

            //Opció 1 : query string $_GET
            $id = $_GET['user'];
            return User::findOrFail($id);

//            dd(json_decode($_GET['user']));
//            return json_decode($_GET['user']);
    }

    private function userIsAuthenticated()
    {
            if (isset($_GET['user'])) {
                return true;
            } else {
                return false;
            }
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class Usuari {
    public $name,$sn1,$sn2;
}

class HomeController extends Controller
{
    public function index ()
    {
            // Passos controlador bàsic (glue entre model i vista)
        // 1) Aconseguir informació de l'usuari de la base de dades
        // 2) Mostrar vista home passant info del usuari

//        $user = new Usuari();
//        $user->name="Guybrush";
//        $user->sn1="Curto";
//        $user->sn2="Threepwood";
//
//        return view('home')->withUser($user);

        // Com a pràctica pot valdre, però lo seu és accedir a base de dades

            $user = User::find(1);

            return view('home')->withUser($user);

    }
}

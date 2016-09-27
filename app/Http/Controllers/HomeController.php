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
        // OPCIÓ 1
//        $name = 'Pepet';
//        $data = ['username' => $name];
//        return view ('home', $data);

        // OPCIÓ 2
//        $data = ['username' => 'Pepet'];
//        return view ('home', $data);

        // OPCIÓ 3
//        return view ('home', ['username' => 'Pepet']);

        // OPCIÓ 4
//        return view ('home')->withUsername('Pepet')->withSurname('Curto');

//  **** Però com és fàcil que haguessem de passar moltes variables,
//       el més pràctic serà utilitzar una classe *****

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

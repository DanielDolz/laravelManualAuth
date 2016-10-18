<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    public function showLoginForm ()
    {
        return view ('auth.login');
    }

    public function login()
    {
        // *** PASSOS NECESSARIS AUTH ***
        // 1.- Obtenir de la base de dades l'usuari amb email  --> Model User
        // 2.- Comprovar el password:
        //    - Hash del password proporcionat (bcrypt)
        //    - Comparar amb el de la base de dades
        // 3.- Segons el resultat:
        //      ERROR -> RETURN TO LOGIN PAGE
        //      CORRECT -> REDIRECT TO HOME


        echo "El login se procesa aquí";
    }
}

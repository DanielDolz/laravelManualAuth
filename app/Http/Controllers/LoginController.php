<?php

namespace App\Http\Controllers;

use App\ManualAuth\Guard;
use App\User;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LoginController extends Controller
{

    protected $guard;

    /**
     * LoginController constructor.
     * @param $guard
     */
    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    public function showLoginForm ()
    {
        return view ('auth.login');
    }

    // DEPENDENCY INJECTION
    public function login(Request $request)
    {

        $this->validateLogin($request);

        $credentials = $request->only(['email','password']);

        if ($this->guard->validate($credentials)) {
            // OK TODO
            $this->guard->setUser();
        }

        return redirect('login');

        // 1) VALIDAR el formulari -> mirar quins camps son obligatoris, msg error, etc. -> Laravel Validation
        //                         -> mirar el nº d'intents (TODO)
        // 2) DELEGAR intent Autenticació a un altre tenint en compte que poden haver diferents
        //            User Providers (SQL, Ldap...):   --> SetUser / UserProvider (TODO)
        //                  OK ->  / Return to Home
        //                  NOT OK -> Redirect to login with error messages

    }

    protected function validateLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
        ]);
    }
//        // *** PASSOS NECESSARIS AUTH ***
//
//        // 1.- Obtenir de la base de dades l'usuari amb email  --> Model User
//        try {
//            $user = User::where(
//                ["email" => $request->input('email')])->firstOrFail();
//        } catch (\Exception $e) {
//            return redirect('login');
//        }
//
//        // 2.- Comprovar el password:
//        //    - Hash del password proporcionat (bcrypt)
//        //    - Comparar amb el de la base de dades
//        if( Hash::check($request->input('password'), $user->password ) ){
//            return redirect('home');
//        } else {
//            return redirect('login');
//        }
//
//
//        // 3.- Segons el resultat:
//        //      ERROR -> RETURN TO LOGIN PAGE
//        //      CORRECT -> REDIRECT TO HOME
//
//        echo "El login se procesa aquí";
//    }
}

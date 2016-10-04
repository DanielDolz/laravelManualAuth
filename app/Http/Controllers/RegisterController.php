<?php
/**
 * Created by PhpStorm.
 * User: danidaniel
 * Date: 29/09/16
 * Time: 17:36
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class RegisterController extends Controller
{
    public function register ()
    {
        return view ('auth.register');
    }
}
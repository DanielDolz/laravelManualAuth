<?php

namespace App\ManualAuth;


use Illuminate\Http\Request;

class ManualGuardByIdParameter implements Guard
{

    /**
     * ManualGuard constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function check()
    {
        //return isset($_COOKIE['user']) ? true : false;
        if ($this->request->has('id')) {
            return true;
        }
    }

    public function validate(array $credentials)
    {
        // TODO: Implement validate() method.
    }

    public function setUser($user)
    {
        // TODO: Implement setUser() method.
    }
}
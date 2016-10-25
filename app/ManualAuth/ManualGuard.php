<?php

namespace App\ManualAuth;


class ManualGuard implements Guard
{

    /**
     * ManualGuard constructor.
     */
    public function __construct()
    {
    }

    public function check()
    {
        return isset($_COOKIE['user']) ? true : false;
    }
}
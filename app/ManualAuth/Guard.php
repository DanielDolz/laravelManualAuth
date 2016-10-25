<?php
/**
 * Created by PhpStorm.
 * User: danidaniel
 * Date: 25/10/16
 * Time: 20:33
 */

namespace App\ManualAuth;


interface Guard
{
    public function check();

}
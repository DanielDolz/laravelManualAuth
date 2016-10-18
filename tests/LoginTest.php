<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase {

    use DatabaseMigrations;

    public function testLoginPageShowsLoginForm()
    {
        $this->visit('/login')
            ->see('Usuari')
            ->see('Password')
        ;

    }

    protected function createTestUser(){
        return factory(\App\User::class,1)->create();
    }

    public function testLoginPostWithUserOk()
    {
        $user = $this->createTestUser();
        $this->visit('/login')
            ->type('user', $user->name)
            ->type('password', $user->password)
            // ->check('terms')
            ->press('login')
            ->seePageIs('/home');
    }
}
<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;

class LoginTest extends TestCase {

    use DatabaseMigrations;

    public function testLoginPageShowsLoginForm()
    {
        $this->visit('/login')
            ->see('Email')
            ->see('Password')
        ;

    }

    protected function createTestUser(){
        //return factory(\App\User::class,1)->create();
        return factory(\App\User::class)->create(['password' => bcrypt('123456')]);
    }

    public function testLoginPostWithUserOk()
    {
        $user = $this->createTestUser();
        $this->visit('/login')
            ->type($user->email,'email')
            ->type('123456','password')
            // ->check('terms')
            ->press('login')
            ->seePageIs('/home');
    }

    public function testLoginPostWithUserNotOk()
    {
        $this->visit('/login')
            ->type('pepe@gmail.com','email') // Un mail que estigue a la base de dades
            ->type('123456','password')
            // ->check('terms')
            ->press('login')
            ->seePageIs('/login');
            //->see('Username not exists');
    }
}
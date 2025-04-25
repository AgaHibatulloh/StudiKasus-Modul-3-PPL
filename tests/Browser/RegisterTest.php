<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * @group step1
     * @group register
     */
    public function testRegister(): void
    {
        $this->browse(callback: function (Browser $browser): void {

            $browser->visit(url: '/')
                    ->assertSee(text: 'Enterprise Application Development')
                    ->clickLink(link: 'Register')
                    ->assertPathIs(path: '/register')
                    ->type(field: 'name', value: 'admin')
                    ->type(field: 'email', value: 'admin12345@gmail.com')
                    ->type(field: 'password', value: 'password')
                    ->type(field: 'password_confirmation', value: 'password')
                    ->press(button: 'REGISTER')
                    ->assertPathIs(path: '/register'); 

            
        });
    }
}


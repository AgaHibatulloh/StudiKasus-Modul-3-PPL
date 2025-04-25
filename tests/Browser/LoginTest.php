<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    // use DatabaseMigrations;
    /**
     * A Dusk test example.
     */
    public function testLogin(): void
    {
        $this->browse(callback: function (Browser $browser): void {

            $browser->visit(url: '/')
                    ->assertSee(text: 'started')
                    ->clickLink(Link: 'Log in')
                    ->assertPathIs(path: '/login')
                    ->type(field: 'email', value: 'admin1234@gmail.com')
                    ->type(field: 'password', value: 'password')
                    ->press(button: 'LOG IN')
                    ->assertPathIs(path: '/dashboard');          
            
        });
    }
}

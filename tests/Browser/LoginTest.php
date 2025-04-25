<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * @group step2
     * @group login
     */
    public function testLogin(): void
    {
        $this->browse(callback: function (Browser $browser): void {

            $browser->visit(url: '/')
                    ->assertSee(text: 'Enterprise Application Development') 
                    ->clickLink(link: 'Log in') 
                    ->assertPathIs(path: '/login')
                    ->type(field: 'email', value: 'admin12345@gmail.com')
                    ->type(field: 'password', value: 'password')
                    ->press(button: 'LOG IN')
                    ->assertPathIs(path: '/dashboard');         
            
        });
    }
}

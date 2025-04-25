<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * @group step7
     * @group logout
     */
    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            // Login first
            $browser->visit('/')
                    ->assertSee('Enterprise Application Development')
                    ->clickLink('Log in')
                    ->assertPathIs('/login')
                    ->type('email', 'admin12345@gmail.com')
                    ->type('password', 'password')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Dashboard')
                    ->assertSee('admin')
                    ->click('@user-dropdown')
                    ->pause(300)
                    ->click('@logout-button');
        });
    }
}
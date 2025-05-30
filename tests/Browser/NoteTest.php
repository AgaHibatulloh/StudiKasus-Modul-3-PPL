<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NoteTest extends DuskTestCase
{
    /**
     * @group step3
     * @group note
     */
    public function testNote(): void
    {
        $this->browse(function (Browser $browser) {
            // Do a fresh login from homepage for better reliability
            $browser->visit('/')
                    ->clickLink('Log in')
                    ->assertPathIs('/login')
                    ->type('email', 'admin12345@gmail.com')
                    ->type('password', 'password')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->clickLink('Notes')
                    ->assertPathIs('/notes')
                    ->clickLink('Create Note')
                    ->assertPathIs('/create-note')
                    ->type('title', 'Test Note')
                    ->type('description', 'This is a test note.')
                    ->screenshot('form-filled')
                    ->press('CREATE'); 
                    
        });
    }
}
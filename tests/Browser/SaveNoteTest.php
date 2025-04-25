<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SaveNoteTest extends DuskTestCase
{
    /**
     * @group step4
     * @group savenote
     */
    public function testSaveNote(): void
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
                    ->clickLink('Notes')
                    ->assertPathIs('/notes')
                    ->assertSee('Notes')
                    ->clickLink('Create Note')
                    ->assertPathIs('/create-note')
                    ->type('title', 'Test Note')
                    ->type('description', 'This is a test note.')
                    ->press('CREATE');
        });
    }
}
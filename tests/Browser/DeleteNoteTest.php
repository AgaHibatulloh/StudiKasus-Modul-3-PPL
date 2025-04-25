<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNoteTest extends DuskTestCase
{
    /**
     * @group step6
     * @group deletenote
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
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
                    ->clickLink('Test Note')
                    ->assertPathBeginsWith('/note/2')
                    ->assertSee('Test Note')
                    ->press('Delete');
        });
    }
}
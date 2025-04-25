<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NoteTest extends DuskTestCase
{
    // use DatabaseMigrations;
    /**
     * A Dusk test example.
     */    public function testNote(): void
    {
                    $this->browse(function (Browser $browser) {
                        $browser->visit('/login')
                            ->type('password', '')
                            ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->clickLink('Notes')
                    ->assertPathIs('/notes')
                    ->clickLink('Create Note')
                    ->assertPathIs('/notes/create')
                    ->type('title', 'Test Note')
                    ->type('description', 'This is a test note.')
                    ->press('Save Note')
                    ->assertPathIs('/notes')
                    ->assertSee('Test Note');
        });
    }
}

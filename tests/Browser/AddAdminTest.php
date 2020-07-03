<?php

namespace Tests\Browser;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddAdminTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->type('name','Superadmin')
                    ->type('pass','123456')
                    ->press('submit')
                    ->click('admin')
                    ->assertSee('administrator list');

        });
    }
}

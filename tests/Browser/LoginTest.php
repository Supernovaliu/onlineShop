<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
include_once("D:/ProgramFiles/wamp3.2.0/www/onlineShop/prepend.php");
class LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        try {
            $this->browse(function (Browser $browser) {
                //check if the
                $browser->visit('/admin')
                    ->assertSee('login page');

                $browser->visit('/admin/login')
                    ->type('name', 'Superadmin')
                    ->type('pass', '123456')
                    ->press('submit')
                    ->assertPathIs('/admin/login');

                $browser->visit('/admin/login')
                    ->type('name', 'superadmin')
                    ->type('pass', '123')
                    ->press('submit')
                    ->assertPathIs('/admin/login');

                $browser->visit('/admin/login')
                    ->type('name', 'superadmin')
                    ->type('pass', '123456')
                    ->press('submit')
                    ->assertPathIs('/admin');

            });
        } catch (\Throwable $e) {
        }

    }

}

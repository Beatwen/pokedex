<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomePageTest extends DuskTestCase
{
    /**
     * Test that the homepage loads successfully and contains the expected text.
     */
    public function testHomePageLoads()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->screenshot('homepage')
                    ->assertSee('Pokémon');
        });
    }
    public function testAuthenticatedFeature()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                    ->visit('/')
                    ->screenshot('loginpage')
                    ->assertSee('Admin Dashboard');
        });
    }
}


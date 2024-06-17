<?php
namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SearchTest extends DuskTestCase
{
    public function testRandomPokemonCard()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->select('search_type', 'Électrik')
                    ->waitForText("Pikapoop", 10)
                    ->assertDontSee("Bitebizarre")
                    ->assertDontSee("Miaouw")
                    ->screenshot('pokemon_search');

        });
    }
}

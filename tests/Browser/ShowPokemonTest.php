<?php
namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowPokemonTest extends DuskTestCase
{
    public function testRandomPokemonCard()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->click('#pokemon-3')
                    ->waitForText("Miaouw est un Pokémon qui a du caractère.", 10)  // Attente maximale de 10 secondes
                    ->assertSee("Miaouw est un Pokémon qui a du caractère.")
                    ->screenshot('pokemon_show');

        });
    }
}

<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowPokemonTest extends DuskTestCase
{
    public function testAddPokemon()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                    ->visit('/admin/pokemon/create')
                    ->type('#name', 'Pikachu')
                    ->type('#weight', '6.0')
                    ->type('#height', '25')
                    ->type('#life', '35')
                    ->select('type_id', '5')
                    ->attach('#image', __DIR__.'/files/pikapoop.jpg')
                    ->click('#submit')
                    ->waitForText("Pokemon enregistré avec succès", 5)
                    ->screenshot('pokemon_creation_success');
        });
    }
}



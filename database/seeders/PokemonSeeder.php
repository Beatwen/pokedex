<?php

namespace Database\Seeders;


use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Database\Seeder;

class PokemonSeeder extends  Seeder
{
    public function run(): void
    {
        $pokemon = Pokemon::factory()->create([
            'name' => 'Carapute',
            'life' => 100,
            'weight' => 100.0,
            'image' => 'images/pokemon/carapute.jpeg',
            'description' => 'Carapute, un cousin éloigné de Carapuce, avec une petite touche de malice ! Contrairement à son parent relativement timide et réservé, Carapute a exploré les côtés plus... colorés de la vie Pokémon. Attention si vous croisez Carapute sur votre chemin, il pourrait bien vous entraîner dans une escapade nocturne dont vous vous souviendrez!'
        ]);
        $type = Type::firstOrCreate([
            'name' => 'Eau',
        ], ['color' => 'blue', 'image' => 'images/eau.png']);
        $pokemon->type()->attach($type->id);
        $Bitebizarre = Pokemon::factory()->create([
            'name' => 'Bitebizarre',
            'life' => 112,
            'weight' => 100.0,
            'image' => 'images/pokemon/bitebizarre.jpeg',

        ]);
        $BitebizzareType = Type::firstOrCreate([
            'name' => 'Plante',
        ], ['color' => 'green', 'image' => 'images/plante.png']);
        $Bitebizarre->type()->attach($BitebizzareType->id);


        $Miaouw = Pokemon::factory()->create([
            'name' => 'Miaouw',
            'life' => 100,
            'weight' => 100.0,
            'image' => 'images/pokemon/miaouw.jpg',
        ]);
        $MiaouwType = Type::firstOrCreate([
            'name' => 'Psy',
        ], ['color' => 'purple', 'image' => 'images/psy.png']);
        $Miaouw->type()->attach($MiaouwType->id);

        $Miaouwtwo = Pokemon::factory()->create([
            'name' => 'MiaouwTwo',
            'life' => 450,
            'weight' => 110.0,
            'image' => 'images/pokemon/miaouwtwo.jpeg',
        ]);
        $MiaouwtwoType = Type::firstOrCreate([
            'name' => 'Psy',
        ], ['color' => 'purple', 'image' => 'images/psy.png']);
        $Miaouwtwo->type()->attach($MiaouwtwoType->id);
    }
}


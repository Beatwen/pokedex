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
            'image' => 'images/carapute.jpeg',
        ]);
        $type = Type::firstOrCreate([
            'name' => 'eau',
            'color' => 'blue',
            'image' => 'images/eau.png'
        ]);
        $pokemon->type()->attach($type->id);
        $Bitebizarre = Pokemon::factory()->create([
            'name' => 'Bitebizarre',
            'life' => 112,
            'weight' => 100.0,
            'image' => 'images/bitebizarre.jpeg',
        ]);
        $BitebizzareType = Type::firstOrCreate([
            'name' => 'plante',
            'color' => 'green',
            'image' => 'images/plante.png'
        ]);
        $Bitebizarre->type()->attach($BitebizzareType->id);


        $Miaouw = Pokemon::factory()->create([
            'name' => 'Miaouw',
            'life' => 100,
            'weight' => 100.0,
            'image' => 'images/miaouw.jpg',
        ]);
        $MiaouwType = Type::firstOrCreate([
            'name' => 'psy',
            'color' => 'purple',
            'image' => 'images/psy.png'
        ]);
        $Miaouw->type()->attach($MiaouwType->id);

        $Miaouwtwo = Pokemon::factory()->create([
            'name' => 'MiaouwTwo',
            'life' => 450,
            'weight' => 110.0,
            'image' => 'images/miaouwtwo.jpeg',
        ]);
        $MiaouwtwoType = Type::firstOrCreate([
            'name' => 'psy',
            'color' => 'purple',
            'image' => 'images/psy.png'
        ]);
        $Miaouwtwo->type()->attach($MiaouwtwoType->id);
    }
}


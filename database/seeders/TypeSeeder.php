<?php

namespace Database\Seeders;

use App\Models\Type;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; // Make sure this uses the correct namespace if it's different

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'Acier', 'color' => '#B7B7CE', 'image' => 'images/acier.png'],
            ['name' => 'Combat', 'color' => '#C22E28', 'image' => 'images/combat.png'],
            ['name' => 'Dragon', 'color' => '#6F35FC', 'image' => 'images/dragon.png'],
            ['name' => 'Eau', 'color' => '#6390F0', 'image' => 'images/eau.png'],
            ['name' => 'Électrik', 'color' => '#F7D02C', 'image' => 'images/electrik.png'],
            ['name' => 'Feu', 'color' => '#EE8130', 'image' => 'images/feu.png'],
            ['name' => 'Fée', 'color' => '#D685AD', 'image' => 'images/fee.png'],
            ['name' => 'Glace', 'color' => '#96D9D6', 'image' => 'images/glace.png'],
            ['name' => 'Insecte', 'color' => '#A6B91A', 'image' => 'images/insecte.png'],
            ['name' => 'Normal', 'color' => '#A8A77A', 'image' => 'images/normal.png'],
            ['name' => 'Plante', 'color' => '#7AC74C', 'image' => 'image/plante.png'],
            ['name' => 'Poison', 'color' => '#A33EA1', 'image' => 'image/poison.png'],
            ['name' => 'Psy', 'color' => '#F95587', 'image' => 'images/psy.png'],
            ['name' => 'Roche', 'color' => '#B6A136', 'image' => 'images/roche.png'],
            ['name' => 'Sol', 'color' => '#E2BF65', 'image' => 'images/sol.png'],
            ['name' => 'Spectre', 'color' => '#735797', 'image' => 'images/spectre.png'],
            ['name' => 'Ténèbres', 'color' => '#705746', 'image' => 'images/tenebres.png'],
            ['name' => 'Vol', 'color' => '#A98FF3', 'image' => 'images/vol.png']
        ];

        foreach ($types as $type) {
            Type::create([
                'name' => $type['name'],
                'color' => $type['color'],
                'image' => $type['image']
            ]);
        }
    }
}


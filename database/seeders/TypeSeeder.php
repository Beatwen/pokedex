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
            ['name' => 'Acier', 'color' => '#B7B7CE', 'image' => 'images/background/acier.png'],
            ['name' => 'Combat', 'color' => '#C22E28', 'image' => 'images/background/combat.png'],
            ['name' => 'Dragon', 'color' => '#6F35FC', 'image' => 'images/background/dragon.png'],
            ['name' => 'Eau', 'color' => '#6390F0', 'image' => 'images/background/eau.png'],
            ['name' => 'Électrik', 'color' => '#F7D02C', 'image' => 'images/background/électrik.png'],
            ['name' => 'Feu', 'color' => '#EE8130', 'image' => 'images/background/feu.png'],
            ['name' => 'Fée', 'color' => '#D685AD', 'image' => 'images/background/fee.png'],
            ['name' => 'Glace', 'color' => '#96D9D6', 'image' => 'images/background/glace.png'],
            ['name' => 'Insecte', 'color' => '#A6B91A', 'image' => 'images/background/insecte.png'],
            ['name' => 'Normal', 'color' => '#A8A77A', 'image' => 'images/background/normal.png'],
            ['name' => 'Plante', 'color' => '#7AC74C', 'image' => 'images/background/plante.png'],
            ['name' => 'Poison', 'color' => '#A33EA1', 'image' => 'images/background/poison.png'],
            ['name' => 'Psy', 'color' => '#F95587', 'image' => 'images/background/psy.png'],
            ['name' => 'Roche', 'color' => '#B6A136', 'image' => 'images/background/roche.png'],
            ['name' => 'Sol', 'color' => '#E2BF65', 'image' => 'images/background/sol.png'],
            ['name' => 'Spectre', 'color' => '#735797', 'image' => 'images/background/spectre.png'],
            ['name' => 'Ténèbres', 'color' => '#705746', 'image' => 'images/background/tenebres.png'],
            ['name' => 'Vol', 'color' => '#A98FF3', 'image' => 'images/background/vol.png'],
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


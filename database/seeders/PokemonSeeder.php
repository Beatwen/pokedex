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
            'weight' => 25.0,
            'height' => 70.0,
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
            'weight' => 30.0,
            'height' => 75.0,
            'image' => 'images/pokemon/bitebizarre.jpeg',
            'description' => "Bitebizarre a un atout qu'il ne veut pas cacher. C'est comme ça. Il est fier de sa différence et il le montre. Il est le plus beau, le plus fort, le plus grand. Il est Bitebizarre. Et il est là pour vous le rappeler."

        ]);
        $BitebizzareType = Type::firstOrCreate([
            'name' => 'Plante',
        ], ['color' => 'green', 'image' => 'images/plante.png']);
        $Bitebizarre->type()->attach($BitebizzareType->id);


        $Miaouw = Pokemon::factory()->create([
            'name' => 'Miaouw',
            'life' => 100,
            'weight' => 70.0,
            'height' => 120,
            'image' => 'images/pokemon/miaouw.jpg',
            'description' => "Miaouw est un Pokémon qui a du caractère. Elle est fière, indépendante et un peu capricieuse. Elle aime qu’on la regarde, qu’on l’admire et qu’on la respecte. #metoo"
        ]);
        $MiaouwType = Type::firstOrCreate([
            'name' => 'Psy',
        ], ['color' => 'purple', 'image' => 'images/psy.png']);
        $Miaouw->type()->attach($MiaouwType->id);

        $Miaouwtwo = Pokemon::factory()->create([
            'name' => 'MiaouwTwo',
            'life' => 450,
            'weight' => 80.0,
            'height' => 220.0,
            'image' => 'images/pokemon/miaouwtwo.jpeg',
            'description' => "MiaouwTwo est le Pokémon le plus puissant de tous les temps. Elle est belle, intelligente, forte et elle le sait. Elle est la reine de la nuit, la maîtresse des étoiles, et elle est là pour vous en mettre plein la vue."
        ]);
        $MiaouwtwoType = Type::firstOrCreate([
            'name' => 'Psy',
        ], ['color' => 'purple', 'image' => 'images/psy.png']);
        $Miaouwtwo->type()->attach($MiaouwtwoType->id);

        $Nidoqueer = Pokemon::factory()->create([
            'name' => 'Nidoqueer',
            'life' => 350,
            'weight' => 80.0,
            'height' => 170.0,
            'image' => 'images/pokemon/nidoqueer.jpg',
            'description' => "Nidoqueer est un Pokémon de la communauté LGBTQ+ qui ne rentre pas dans les cases. Il est fier de sa différence et il le montre. Grand fan the YMCA by the way."
        ]);
        $Nidoqueer->type()->attach(15);

        $Carabiffle = Pokemon::factory()->create([
            'name' => 'Carabiffle',
            'life' => 250,
            'weight' => 80.0,
            'height' => 170.0,
            'image' => 'images/pokemon/carabiffle.jpg',
            'description' => "Il est vrai qu'une biffle n'est pas toujours de bon goût, mais Carabiffle est là pour vous prouver le contraire. Il est doux, gentil, et il ne demande qu'à être aimé. Alors n'hésitez pas, venez lui faire un câlin."
        ]);
        $Carabiffle->type()->attach(4);

        $Melofesse = Pokemon::factory()->create([
            'name' => 'Melofesse',
            'life' => 250,
            'weight' => 80.0,
            'height' => 170.0,
            'image' => 'images/pokemon/melofesse.jpg',
            'description' => "Melofesse est un gentil pokémon. Elle est plutôt timide, mais elle a un grand coeur. Elle aime les câlins, les bisous, et les bonbons. Elle est là pour vous réconforter et vous faire sourire."
        ]);
        $Melofesse->type()->attach(7);

        $Pikapoop = Pokemon::factory()->create([
            'name' => 'Pikapoop',
            'life' => 115,
            'weight' => 12.0,
            'height' => 32.0,
            'image' => 'images/pokemon/pikapoop.jpg',
            'description' => "Pikapoop est un Pokémon un peu spécial. Est-il vraiment nécessaire de parler de lui ?"
        ]);
        $Pikapoop->type()->attach(5);

        $Dracofion = Pokemon::factory()->create([
            'name' => 'Dracofion',
            'life' => 400,
            'weight' => 225.0,
            'height' => 260.0,
            'image' => 'images/pokemon/dracofion.jpg',
            'description' => "Dracofion est un Pokémon légendaire. Il est puissant, majestueux, et il ne se laisse pas marcher sur les pieds. Il est le roi des cieux, le maître du feu, et il est là pour vous protéger."
        ]);
        $Dracofion->type()->attach(6);
    }
}


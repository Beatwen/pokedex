<?php

namespace Database\Seeders;

use App\Models\Attaque;
use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttaqueSeeder extends Seeder
{
    /**
     * The Pokémon moves data.
     *
     * @var array
     */
    protected $moves = [
        ['name' => 'Aqua-Jicle', 'type' => 'Eau', 'category' => 'Physique', 'power' => 40, 'accuracy' => 100, 'pp' => 20, 'description' => 'L’utilisateur frappe en priorité.', 'probability' => null],
        ['name' => 'Hydrocution anale', 'type' => 'Eau', 'category' => 'Statut', 'power' => null, 'accuracy' => null, 'pp' => 20, 'description' => 'L’utilisateur récupère un peu de PV à chaque tour.', 'probability' => null],
        ['name' => 'Queue de Sirène', 'type' => 'Eau', 'category' => 'Physique', 'power' => 90, 'accuracy' => 90, 'pp' => 10, 'description' => 'Aucun effet supplémentaire.', 'probability' => null],
        ['name' => 'Lancer de string', 'type' => 'Combat', 'category' => 'Physique', 'power' => 15, 'accuracy' => 100, 'pp' => 20, 'description' => 'Frappe 2 à 5 fois de suite.', 'probability' => null],
        ['name' => 'Aromathérapie', 'type' => 'Plante', 'category' => 'Statut', 'power' => null, 'accuracy' => null, 'pp' => 5, 'description' => 'Soigne les problèmes de statut de tous les Pokémon de l’équipe.', 'probability' => null],
        ['name' => 'Brume tantrique', 'type' => 'Fée', 'category' => 'Statut', 'power' => null, 'accuracy' => null, 'pp' => 20, 'description' => 'Augmente la Défense Spéciale d’un coéquipier.', 'probability' => null],
        ['name' => 'Assistance Threesome', 'type' => 'Normal', 'category' => 'Statut', 'power' => null, 'accuracy' => null, 'pp' => 20, 'description' => 'Utilise aléatoirement une attaque connue par un membre de l’équipe.', 'probability' => null],
        ['name' => 'Assurance Foursome', 'type' => 'Ténèbres', 'category' => 'Physique', 'power' => 60, 'accuracy' => 100, 'pp' => 10, 'description' => 'La puissance est doublée si la cible a déjà subi des dégâts durant le tour.', 'probability' => null],
        ['name' => 'Tétonnement', 'type' => 'Spectre', 'category' => 'Physique', 'power' => 30, 'accuracy' => 100, 'pp' => 15, 'description' => 'Peut apeurer la cible.', 'probability' => 30],
        ['name' => 'Barrage Anal', 'type' => 'Spectre', 'category' => 'Spécial', 'power' => 120, 'accuracy' => 100, 'pp' => 5, 'description' => 'L’utilisateur attaque en envoyant une quantité terrifiante de petits fantômes sur les Pokémon adverses.', 'probability' => null],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->moves as $move) {
            $type = Type::where('name', $move['type'])->first();
            Attaque::create([
                'name' => $move['name'],
                'power' => $move['power'],
                'type_id'=> $type->id,
                'description' => $move['description'],
                'category' => $move['category'],
                'accuracy' => $move['accuracy'],
                'pp' => $move['pp'],
                'probability' => $move['probability']
            ]);
        }
        $attaques = Attaque::all();
        foreach ($attaques as $attaque) {
            $attaque->pokemon()->attach(Pokemon::inRandomOrder()->limit(2)->get());
        }
        // Si j'ai le temps, préparé des attaques non random :
        // $pokemonAttack1IDs = Pokemon::whereIn('name', ['Carapute', 'MiaouwTwo'])->pluck('id');
        // $pokemonAttack2IDs = Pokemon::whereIn('name', ['Carapute', 'Miaouw'])->pluck('id');
        // $pokemonAttack3IDs = Pokemon::whereIn('name', ['Miaouw', 'MiaouwTwo', 'Carapute'])->pluck('id');
        // $pokemonAttack4IDs = Pokemon::whereIn('name', ['Carapute', 'MiaouwTwo'])->pluck('id');
        // $pokemonAttack5IDs = Pokemon::whereIn('name', ['Bitebizarre', 'MiaouwTwo'])->pluck('id');
        // $pokemonAttack6IDs = Pokemon::whereIn('name', ['Bitebizarre', 'Miaouw'])->pluck('id');
        // $attack = Attaque::whereID('1')->attach($pokemonAttack1IDs);

    }
}

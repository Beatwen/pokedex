<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomepageController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::with('type')->get();
        return Inertia::render('Index' , ['pokemons' => $pokemons]);
    }
    public function show(Pokemon $pokemon)
    {
        $pokemon->load('type', 'attaque');
        return Inertia::render('Pokemon/Index', ['pokemon' => $pokemon]);
    }
}

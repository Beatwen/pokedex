<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::with('type')->get();
        return Inertia::render('Admin/Pokemon/Index' , ['pokemons' => $pokemons]);
    }
}

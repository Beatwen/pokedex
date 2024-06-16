<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pokemon\CreatePokemonRequest;
use App\Http\Requests\Pokemon\UpdatePokemonRequest;
use App\Models\Attaque;
use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return Inertia::render('Admin/Pokemon/Create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePokemonRequest $request)
    {

        $pokemon = new Pokemon();
        $validated = $request->validated();
        $pokemon->fill($validated);

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $destinationPath = public_path('storage/images/pokemon');
        $file->move($destinationPath, $filename);
        $pokemon->image = 'images/pokemon/' . $filename;
        $pokemon->save();
        $pokemon->type()->attach($request->type_id);
        $pokemon->type()->attach($request->type_id2);
    }


    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return Inertia::render('Pokemon/Index', ['pokemon' => $pokemon]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        $types = Type::all();
        $attaques = Attaque::all();
        $pokemonWithTypes = $pokemon->load('type', 'attaque');
        return Inertia::render('Admin/Pokemon/Edit', ['pokemon' => $pokemonWithTypes, 'types' => $types, 'attaques' => $attaques]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePokemonRequest $request, Pokemon $pokemon)
    {
        $validated = $request->validated();
        $pokemon->name = $validated['name'];
        $pokemon->life = $validated['life'];
        $pokemon->weight = $validated['weight'];
        $typeIds = array_filter([
            $validated['type_id'] ?? null,
            $validated['type_id2'] ?? null
        ]);
        $pokemon->type()->sync($typeIds);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $destinationPath = public_path('storage/images/pokemon/');
            $file->move($destinationPath, $filename);
            $pokemon->image = 'images/pokemon/' . $filename;
        }
        $pokemon->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
    }
    public function addAttaque(Request $request, Pokemon $pokemon)
    {
        $pokemon->attaque()->syncWithoutDetaching($request->attaque_id);
    }

    public function removeAttaque(Request $request, Pokemon $pokemon)
    {
        $pokemon->attaque()->detach($request->attaque_id);
    }
}

<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'life' => 'required|numeric',
            'type_id' => 'required|exists:types,id',  // Ensure the type ID exists
            'image' => 'sometimes|file|image|max:2048',  // Optional image upload
        ]);

        // Create a new Pokemon instance
        $pokemon = new Pokemon();
        $pokemon->name = $request->name;
        $pokemon->weight = $request->weight;
        $pokemon->life = $request->life;
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $destinationPath = public_path('storage/');
        $file->move($destinationPath, $filename);
        $pokemon->image = 'images/' . $filename;
        $pokemon->save();
        $pokemon->type()->attach($request->type_id);

    }


    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return Inertia::render('Pokemon/Index' , ['pokemon' => $pokemon]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {

        $pokemonWithTypes = $pokemon->load('type');
        return Inertia::render('Admin/Pokemon/Edit' , ['pokemon' => $pokemonWithTypes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
            $pokemon->name = $request->name;
            $pokemon->weight = $request->weight;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $destinationPath = public_path('storage/');
                $file->move($destinationPath, $filename);
                $pokemon->image = '/' . $filename;
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
}

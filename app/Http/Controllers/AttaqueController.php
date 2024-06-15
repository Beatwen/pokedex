<?php

namespace App\Http\Controllers;

use App\Models\Attaque;
use App\Models\Type;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttaqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Attaques/Index', [
            'attaques' => Attaque::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Attaques/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attaque = new Type();
        $attaque->name = $request->name;
        $attaque->color = $request->color;
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $destinationPath = public_path('storage/images/background');
        $file->move($destinationPath, $filename);
        $attaque->image = 'images/background/' . $filename;
        $attaque->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $attaque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $attaque)
    {
        $TypesWithPokemon = $attaque->load('pokemon');
        return Inertia::render('Admin/Types/Edit' , ['types' => $TypesWithPokemon]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $attaque)
    {
        $attaque->name = $request->name;
        $attaque->color = $request->color;
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $destinationPath = public_path('storage/images/background');
        $file->move($destinationPath, $filename);
        $attaque->image = 'images/background/' . $filename;
        $attaque->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $attaque)
    {
        $attaque->delete();
    }
}

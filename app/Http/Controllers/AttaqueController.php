<?php

namespace App\Http\Controllers;

use App\Http\Requests\Attaques\CreateAttaqueRequest;
use App\Http\Requests\Attaques\UpdateAttaqueRequest;
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
        $types = Type::all();
        return Inertia::render('Admin/Attaques/Create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAttaqueRequest $request)
    {
        $attaque = new Attaque();
        $validated = $request->validated();
        $attaque->fill($validated);
        $attaque->save();

    }


    /**
     * Display the specified resource.
     */
    public function show(Attaque $attaque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attaque $attaque)
    {
        $types = Type::all();
        $attaqueWithTypes = $attaque->load('type');
        return Inertia::render('Admin/Attaques/Edit', ['attaques' => $attaqueWithTypes, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttaqueRequest $request, Attaque $attaque)
    {
        $validated = $request->validated();
        $attaque->fill($validated);
        $attaque->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attaque $attaque)
    {
        $attaque->delete();
    }
}

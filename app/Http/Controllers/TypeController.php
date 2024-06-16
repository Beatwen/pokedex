<?php

namespace App\Http\Controllers;

use App\Http\Requests\Types\CreateTypeRequest;
use App\Http\Requests\Types\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Types/Index', [
            'types' => Type::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Types/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTypeRequest $request)
    {
        $type = new Type();
        $validated = $request->validated();
        $type->fill($validated);

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $destinationPath = public_path('storage/images/background');
        $file->move($destinationPath, $filename);
        $type->image = 'images/background/' . $filename;
        $type->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $TypesWithPokemon = $type->load('pokemon');
        return Inertia::render('Admin/Types/Edit' , ['types' => $TypesWithPokemon]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $validated = $request->validated();
        $type->fill($validated);

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $destinationPath = public_path('storage/images/background');
        $file->move($destinationPath, $filename);
        $type->image = 'images/background/' . $filename;
        $type->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
    }
}

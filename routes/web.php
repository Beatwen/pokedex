<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TypeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomepageController::class, 'index'])->name('index');
Route::get('/pokemons/{pokemon}', [PokemonController::class, 'show'])->name('pokemon.show');
Route::get('/admin/edit/{pokemon}', [PokemonController::class, 'edit'])->middleware(['auth', 'verified'])->name('pokemon.edit');
Route::get('/admin/pokemon', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin/index');
Route::delete('/admin/pokemon/delete/{pokemon}', [PokemonController::class, 'destroy'])->middleware(['auth', 'verified'])->name('pokemon.delete');
Route::post('/admin/pokemon/update/{pokemon}', [PokemonController::class, 'update'])->middleware(['auth', 'verified'])->name('pokemon.update');
Route::get('/admin/pokemon/create', [PokemonController::class, 'create'])->middleware(['auth', 'verified'])->name('pokemon.create');
Route::post('/admin/pokemon/create', [PokemonController::class, 'store'])->middleware(['auth', 'verified'])->name('pokemon.create');
Route::get('/admin/types', [TypeController::class, 'index'])->middleware(['auth', 'verified'])->name('types.index');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

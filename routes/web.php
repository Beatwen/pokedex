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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('admin/pokemon', [AdminController::class, 'index'])->name('admin/index');
    Route::get('/types', [TypeController::class, 'index'])->name('types.index');
    Route::get('/attaques', [TypeController::class, 'index'])->name('attaques.index');

    route::group(['prefix' => 'types'], function() {
        Route::get('/edit/{type}', [TypeController::class, 'edit'])->name('types.edit');
        Route::delete('/delete/{type}', [TypeController::class, 'destroy'])->name('types.delete');
        Route::post('/update/{type}', [TypeController::class, 'update'])->name('types.update');
        Route::get('/create', [TypeController::class, 'create'])->name('types.create');
        Route::post('/create', [TypeController::class, 'store'])->name('types.store');
    });

    Route::group(['prefix' => 'pokemon'], function() {
        Route::get('/edit/{pokemon}', [PokemonController::class, 'edit'])->name('pokemon.edit');
        Route::delete('/delete/{pokemon}', [PokemonController::class, 'destroy'])->name('pokemon.delete');
        Route::post('/update/{pokemon}', [PokemonController::class, 'update'])->name('pokemon.update');
        Route::get('/create', [PokemonController::class, 'create'])->name('pokemon.create');
        Route::post('/create', [PokemonController::class, 'store'])->name('pokemon.store');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $fillable = [
        'name',
        'life',
        'weight',
        'type',
    ];
    use HasFactory;
    public function type()
    {

        return $this->belongsToMany(Type::class, 'pokemon_types');
    }
    public function attaque()
    {

        return $this->belongsToMany(Attaque::class, 'attaque_pokemon');
    }
}

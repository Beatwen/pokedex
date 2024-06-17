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
        'height',
        'type',
        'description',
    ];
    use HasFactory;
    public function type()
    {

        return $this->belongsToMany(Type::class, 'pokemon_types')->orderByPivot('created_at', 'desc');
    }
    public function attaque()
    {

        return $this->belongsToMany(Attaque::class, 'attaque_pokemon');
    }
}

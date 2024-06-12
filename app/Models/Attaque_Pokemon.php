<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attaque_Pokemon extends Model
{
    use HasFactory;
    protected $fillable = [
        'pokemon_id',
        'attaque_id',
    ];
    public function pokemon()
    {
        return $this->belongsTo(Pokemon::class);
    }
    public function attaque()
    {
        return $this->belongsTo(Attaque::class);
    }
}

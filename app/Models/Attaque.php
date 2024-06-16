<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attaque extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'power',
        'type_id',
        'description',
        'category',
        'accuracy',
        'pp',
        'probability',
    ];
    public function pokemon()
    {
        return $this->belongsToMany(Pokemon::class, 'attaque_pokemon');
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}

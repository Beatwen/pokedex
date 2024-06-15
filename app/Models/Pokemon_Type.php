<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon_Type extends Model
{
    use HasFactory;
    protected $table = 'pokemon_types'; // Spécifiez explicitement le nom de la table
    public $timestamps = false; // Désactiver les timestamps si non nécessaires

    protected $fillable = [
        'pokemon_id',
        'type_id',
    ];
    public function pokemon()
    {
        return $this->belongsTo(Pokemon::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}

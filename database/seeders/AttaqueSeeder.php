<?php

namespace Database\Seeders;

use App\Models\Attaque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttaqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attaque::factory()->create([
            'name' => 'Charge',
            'power' => '40',
            'type_id' => 1,
            'description' => 'Charge l\'ennemi avec une grande force'
        ]);
    }
}

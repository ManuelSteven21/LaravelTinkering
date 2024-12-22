<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Film; // Agregar la importación de FilmSeeder
use App\Models\Game; // Agregar la importación de GameSeeder

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un usuario de prueba (si lo deseas)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Llamar a los seeders de Film y Game
        $this->call([
            FilmSeeder::class,  // Llamada al seeder de films
            GameSeeder::class,  // Llamada al seeder de games
        ]);
    }
}

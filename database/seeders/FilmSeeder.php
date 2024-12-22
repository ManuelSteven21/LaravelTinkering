<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::create([
            'title' => 'Inception',
            'description' => 'A mind-bending thriller by Christopher Nolan.',
            'year' => 2010
        ]);

        Film::create([
            'title' => 'The Matrix',
            'description' => 'A revolutionary sci-fi classic.',
            'year' => 1999
        ]);
    }
}

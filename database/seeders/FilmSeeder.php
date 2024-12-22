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
            'year' => 2010,
            'director' => 'Christopher Nolan',
            'genre' => 'Sci-Fi, Thriller',
            'cast' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page',
        ]);

        Film::create([
            'title' => 'The Matrix',
            'description' => 'A revolutionary sci-fi classic.',
            'year' => 1999,
            'director' => 'Lana Wachowski, Lilly Wachowski',
            'genre' => 'Action, Sci-Fi',
            'cast' => 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss',
        ]);

        Film::create([
            'title' => 'The Dark Knight',
            'description' => 'Batman faces off against the Joker in Gotham City.',
            'year' => 2008,
            'director' => 'Christopher Nolan',
            'genre' => 'Action, Crime, Drama',
            'cast' => 'Christian Bale, Heath Ledger, Aaron Eckhart',
        ]);

        Film::create([
            'title' => 'Avatar',
            'description' => 'A paraplegic former Marine dispatched to the moon Pandora on a unique mission.',
            'year' => 2009,
            'director' => 'James Cameron',
            'genre' => 'Action, Adventure, Sci-Fi',
            'cast' => 'Sam Worthington, Zoe Saldana, Sigourney Weaver',
        ]);

        Film::create([
            'title' => 'Pulp Fiction',
            'description' => 'The lives of two mob hitmen, a boxer, a gangster’s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
            'year' => 1994,
            'director' => 'Quentin Tarantino',
            'genre' => 'Crime, Drama',
            'cast' => 'John Travolta, Uma Thurman, Samuel L. Jackson',
        ]);
    }
}

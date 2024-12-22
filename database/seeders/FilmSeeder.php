<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = [
            [
                'title' => 'Inception',
                'description' => 'A mind-bending thriller by Christopher Nolan.',
                'year' => 2010,
                'director' => 'Christopher Nolan',
                'cast' => 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page',
                'genre' => 'Sci-Fi, Thriller'
            ],
            [
                'title' => 'The Matrix',
                'description' => 'A revolutionary sci-fi classic.',
                'year' => 1999,
                'director' => 'Wachowski Brothers',
                'cast' => 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss',
                'genre' => 'Sci-Fi, Action'
            ],
            [
                'title' => 'Interstellar',
                'description' => 'A group of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'year' => 2014,
                'director' => 'Christopher Nolan',
                'cast' => 'Matthew McConaughey, Anne Hathaway, Jessica Chastain',
                'genre' => 'Sci-Fi, Drama'
            ],
            [
                'title' => 'The Dark Knight',
                'description' => 'Batman faces a criminal mastermind known as The Joker.',
                'year' => 2008,
                'director' => 'Christopher Nolan',
                'cast' => 'Christian Bale, Heath Ledger, Aaron Eckhart',
                'genre' => 'Action, Crime, Drama'
            ],
            [
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'year' => 1972,
                'director' => 'Francis Ford Coppola',
                'cast' => 'Marlon Brando, Al Pacino, James Caan',
                'genre' => 'Crime, Drama'
            ]
        ];

        // Recorremos el array de films y creamos cada uno
        foreach ($films as $filmData) {
            // Obtenemos la imagen de la API OMDb
            $imageUrl = $this->getImageUrlFromOmdb($filmData['title']);

            // Creamos el film en la base de datos
            Film::create([
                'title' => $filmData['title'],
                'description' => $filmData['description'],
                'year' => $filmData['year'],
                'director' => $filmData['director'],
                'cast' => $filmData['cast'],
                'genre' => $filmData['genre'],
                'image_url' => $imageUrl // Asignamos la imagen obtenida de OMDb
            ]);
        }
    }

    private function getImageUrlFromOmdb($title)
    {
        // Asegúrate de usar tu propia API Key de OMDb
        $apiKey = 'b3324b4f';
        $url = "http://www.omdbapi.com/?t=" . urlencode($title) . "&apikey=" . $apiKey;

        try {
            // Obtener la respuesta JSON de la API
            $response = file_get_contents($url);

            if (!$response) {
                return null; // Si no se puede obtener la respuesta, devuelve null
            }

            $data = json_decode($response, true);

            // Verificar si la respuesta es válida
            if (isset($data['Poster']) && $data['Poster'] !== 'N/A') {
                return $data['Poster'];
            }

        } catch (\Exception $e) {
            // Manejar cualquier error durante la solicitud de la API
            return null;
        }

        return null; // Si no se encuentra un póster válido, devolver null
    }
}

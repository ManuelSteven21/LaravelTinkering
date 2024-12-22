<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'title' => 'The Witcher 3: Wild Hunt',
                'description' => 'An epic open-world role-playing game set in a fantastical world.',
                'year' => 2015,
                'director' => 'CD Projekt Red',
                'rating' => 90,
                'genre' => 'RPG, Action, Adventure'
            ],
            [
                'title' => 'Red Dead Redemption 2',
                'description' => 'A story of a gang in the late 1800s American frontier.',
                'year' => 2018,
                'director' => 'Rockstar Games',
                'rating' => 94,
                'genre' => 'Action, Adventure'
            ],
            [
                'title' => 'Minecraft',
                'description' => 'A sandbox game that lets you build and explore a blocky world.',
                'year' => 2011,
                'director' => 'Mojang',
                'rating' => 85,
                'genre' => 'Sandbox, Survival'
            ],
            [
                'title' => 'The Last of Us Part II',
                'description' => 'A gripping action-adventure game that focuses on emotional storytelling.',
                'year' => 2020,
                'director' => 'Naughty Dog',
                'rating' => 93,
                'genre' => 'Action, Adventure'
            ],
            [
                'title' => 'Cyberpunk 2077',
                'description' => 'A dystopian open-world RPG set in a high-tech, cyberpunk future.',
                'year' => 2020,
                'director' => 'CD Projekt Red',
                'rating' => 80,
                'genre' => 'RPG, Action'
            ]
        ];

        // Recorremos el array de juegos y creamos cada uno
        foreach ($games as $gameData) {
            // Obtenemos la imagen de la API RAWG
            $imageUrl = $this->getImageUrlFromRawg($gameData['title']);

            // Creamos el juego en la base de datos
            Game::create([
                'title' => $gameData['title'],
                'description' => $gameData['description'],
                'year' => $gameData['year'],
                'director' => $gameData['director'],
                'rating' => $gameData['rating'],
                'genre' => $gameData['genre'],
                'image_url' => $imageUrl // Asignamos la imagen obtenida de RAWG
            ]);
        }
    }

    private function getImageUrlFromRawg($title)
    {
        // Asegúrate de usar tu propia API Key de RAWG
        $apiKey = 'e31c71a936b74ad6a4c9b317da972076';
        $apiUrl = 'https://api.rawg.io/api/games?key=' . $apiKey . '&page_size=1&search=' . urlencode($title);

        // Realizar la petición a la API
        $response = @file_get_contents($apiUrl); // Utiliza @ para suprimir errores si la petición falla
        if (!$response) {
            return null; // Si no se puede obtener la respuesta, devuelve null
        }

        $data = json_decode($response);

        // Verificar si la respuesta es correcta
        if ($data && isset($data->results) && count($data->results) > 0) {
            // Si se encuentra, obtener la imagen
            return $data->results[0]->background_image ?? null;
        }

        // Si no se encuentra la imagen, devolver null
        return null;
    }
}

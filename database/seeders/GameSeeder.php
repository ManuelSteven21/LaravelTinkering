<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::create([
            'title' => 'The Legend of Zelda: Breath of the Wild',
            'description' => 'An open-world adventure game where players explore the kingdom of Hyrule.',
            'year' => 2017,
            'director' => 'Hidemaro Fujibayashi',
            'genre' => 'Action, Adventure',
            'rating' => '10',
        ]);

        Game::create([
            'title' => 'Red Dead Redemption 2',
            'description' => 'An epic tale of outlaw Arthur Morgan in the American frontier.',
            'year' => 2018,
            'director' => 'Dan Houser',
            'genre' => 'Action, Adventure, RPG',
            'rating' => '9.8',
        ]);

        Game::create([
            'title' => 'The Witcher 3: Wild Hunt',
            'description' => 'An RPG where Geralt of Rivia hunts down a child of prophecy.',
            'year' => 2015,
            'director' => 'Konrad Tomaszkiewicz',
            'genre' => 'Action, RPG',
            'rating' => '9.5',
        ]);

        Game::create([
            'title' => 'Minecraft',
            'description' => 'A sandbox game where players can create and explore virtual worlds made of blocks.',
            'year' => 2011,
            'director' => 'Markus Persson',
            'genre' => 'Sandbox, Survival',
            'rating' => '9.0',
        ]);

        Game::create([
            'title' => 'God of War',
            'description' => 'A brutal action-adventure game following the journey of Kratos and his son Atreus.',
            'year' => 2018,
            'director' => 'Cory Barlog',
            'genre' => 'Action, Adventure',
            'rating' => '9.4',
        ]);
    }
}

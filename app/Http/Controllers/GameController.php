<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validació per als nous camps
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'year' => 'required|integer',
            'director' => 'required|max:255',  // Nou camp (opcional en este caso)
            'rating' => 'required|max:100',
            'genre' => 'required|max:100'
        ]);

        // Obtenir la imatge des de l'API RAWG
        $imageUrl = $this->getImageUrlFromRawg($request->title);

        // Crear el videojoc amb la informació del formulari i la imatge
        Game::create([
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year,
            'director' => $request->director, // Opcional, solo si lo necesitas
            'rating' => $request->rating,
            'genre' => $request->genre,
            'image_url' => $imageUrl, // Afegir la imatge
        ]);

        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        // Obtenemos el póster desde la API de RAWG
        $poster = $this->getImageUrlFromRawg($game->title);

        return view('games.show', compact('game', 'poster'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        // Validació per als nous camps
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'year' => 'required|integer',
            'description' => 'required|max:255',
            'director' => 'required|max:255', // Nou camp
            'rating' => 'required|max:100',
        ]);

        // Si el títol canvia, actualitzem la imatge
        $imageUrl = $game->image_url; // Manté la imatge actual si no es canvia el títol
        if ($request->title !== $game->title) {
            $imageUrl = $this->getImageUrlFromRawg($request->title); // Actualitza la imatge
        }

        // Actualitza el videojoc amb els nous valors
        $game->update([
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year,
            'director' => $request->director,
            'genre' => $request->director,
            'rating' => $request->rating,
            'image_url' => $imageUrl, // Actualitza la imatge
        ]);

        return redirect()->route('games.index')->with('success', 'Game updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        return view('games.delete', compact('game'));
    }

    /**
     * Confirm Destroy
     */
    public function confirmDestroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }

    /**
     * Get the image URL from RAWG API.
     */
    private function getImageUrlFromRawg($title)
    {
        // Substitueix amb la teva pròpia API Key de RAWG
        $apiKey = 'e31c71a936b74ad6a4c9b317da972076';
        $apiUrl = 'https://api.rawg.io/api/games?key=' . $apiKey . '&page_size=1&search=' . urlencode($title);

        // Realitzar la petició a l'API
        $response = @file_get_contents($apiUrl); // Utilitza @ per suprimir errors si la petició falla
        if (!$response) {
            return null; // Si no es pot obtenir la resposta, retorna null
        }

        $data = json_decode($response);

        // Verificar si la resposta és correcta
        if ($data && isset($data->results) && count($data->results) > 0) {
            // Si es troba, obtenir la imatge
            return $data->results[0]->background_image ?? null;
        }

        // Si no es troba la imatge, retorna null
        return null;
    }
}

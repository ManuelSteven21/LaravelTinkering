<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('films.create');
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
            'director' => 'required|max:255',  // Nou camp
            'cast' => 'required|max:255',      // Nou camp
            'genre' => 'required|max:255',
        ]);

        // Obtenir la imatge des de l'API OMDb
        $imageUrl = $this->getImageUrlFromOmdb($request->title);

        // Crear la pel·lícula amb la informació del formulari i la imatge
        Film::create([
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year,
            'director' => $request->director,
            'cast' => $request->cast,
            'genre' => $request->genre,
            'image_url' => $imageUrl, // Afegir la imatge
        ]);

        return redirect()->route('films.index')->with('success', 'Film created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        // Validació per als nous camps
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'year' => 'required|integer',
            'director' => 'required|max:255', // Nou camp
            'cast' => 'required|max:255',     // Nou camp
            'genre' => 'required|max:255',
        ]);

        // Si el títol canvia, actualitzem la imatge
        $imageUrl = $film->image_url; // Manté la imatge actual si no es canvia el títol
        if ($request->title !== $film->title) {
            $imageUrl = $this->getImageUrlFromOmdb($request->title); // Actualitza la imatge
        }

        // Actualitza la pel·lícula amb els nous valors
        $film->update([
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year,
            'director' => $request->director,
            'cast' => $request->cast,
            'genre' => $request->genre,
            'image_url' => $imageUrl, // Actualitza la imatge
        ]);

        return redirect()->route('films.index')->with('success', 'Film updated successfully.');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        return view('films.delete', compact('film'));
    }


    /**
     * Confirm Destroy
     */
    public function confirmDestroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }
}

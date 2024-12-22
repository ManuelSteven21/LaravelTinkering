@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Contenedor principal con fondo semitransparente (opaco) y márgenes adecuados -->
    <div class="flex flex-col items-center justify-center py-12 px-6">
        <div class="container mx-auto bg-black bg-opacity-50 text-white p-8 rounded-lg shadow-lg max-w-4xl">
            <!-- Título principal -->
            <div class="max-w-4xl mx-auto text-center space-y-6 py-8">
                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-bold text-white break-words">
                    Welcome to LaravelTinkering!
                </h1>
                <p class="text-base sm:text-lg text-gray-200">This is the main page of the project, showcasing Movies and Video Games.</p>
            </div>

            <!-- Sección de Películas y Videojuegos (en columnas en pantallas grandes, en filas en pantallas pequeñas) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-8">
            <!-- Sección de Películas -->
                <div class="bg-white text-black p-4 sm:p-6 rounded-lg shadow-lg flex flex-col items-center">
                <h2 class="text-3xl font-semibold mb-4">Movies</h2>
                    <p class="mb-4 text-center">Explore a wide collection of films, from timeless classics to modern blockbusters. Find your next favorite movie.</p>
                    <a href="/films" class="inline-flex items-center bg-blue-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-blue-600">
                        <img src="{{ asset('assets/claqueta.png') }}" alt="Movies" class="w-4 h-4 sm:w-6 sm:h-6 mr-2" />
                        Explore Films
                    </a>
                </div>

                <!-- Sección de Videojuegos -->
                <div class="bg-white text-black p-4 sm:p-6 rounded-lg shadow-lg flex flex-col items-center">
                <h2 class="text-3xl font-semibold mb-4">Video Games</h2>
                    <p class="mb-4 text-center">Browse through a variety of exciting video games, from action-packed adventures to immersive RPGs.</p>
                    <a href="/games" class="inline-flex items-center bg-blue-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-lg hover:bg-blue-600">
                        <!-- Icono de videojuego desde assets -->
                        <img src="{{ asset('assets/videogames.png') }}" alt="Games" class="w-4 h-4 sm:w-6 sm:h-6 mr-2" />
                        Play Games
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

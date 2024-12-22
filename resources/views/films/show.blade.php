@extends('layouts.app')

@section('title', 'Show Film')

@section('content')
    <!-- Contenedor principal -->
    <div class="flex flex-col items-center justify-center py-12 px-6">
        <div class="container mx-auto bg-black bg-opacity-70 text-white p-8 rounded-lg shadow-lg max-w-full sm:max-w-4xl">
            <!-- Título de la película -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-semibold mb-6 text-center">{{ $film->title }}</h1>

            <!-- Información de la película -->
            <div class="space-y-4 sm:space-y-6">
                <!-- Director -->
                <p class="text-lg sm:text-xl md:text-lg"><strong>Director:</strong> {{ $film->director }}</p>

                <!-- Cast -->
                <p class="text-lg sm:text-xl md:text-lg"><strong>Cast:</strong> {{ $film->cast }}</p>

                <!-- Genre -->
                <p class="text-lg sm:text-xl md:text-lg"><strong>Genre:</strong> {{ $film->genre }}</p>

                <!-- Year -->
                <p class="text-lg sm:text-xl md:text-lg"><strong>Year:</strong> {{ $film->year }}</p>

                <!-- Description -->
                <p class="text-lg sm:text-xl md:text-lg"><strong>Description:</strong> {{ $film->description }}</p>
            </div>

            <!-- Imagen de la película si existe -->
            @if ($film->image_url)
                <div class="mt-6 flex justify-center">
                    <img src="{{ $film->image_url }}" alt="Poster of {{ $film->title }}" class="max-w-full h-auto rounded-md shadow-md w-full sm:w-96 md:w-1/2 lg:w-1/3">
                </div>
            @else
                <p class="mt-4 text-center text-gray-400">No image available</p>
            @endif

            <!-- Botón para volver a la lista de películas -->
            <div class="mt-6 text-center">
                <a href="{{ route('films.index') }}" class="inline-flex items-center bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out">
                    <!-- Icono de regresar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5"></path>
                        <path d="M12 5l-7 7 7 7"></path>
                    </svg>
                    Back to list
                </a>
            </div>
        </div>
    </div>
@endsection

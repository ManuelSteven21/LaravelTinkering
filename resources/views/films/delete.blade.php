@extends('layouts.app')

@section('title', 'Delete Film')

@section('content')
    <!-- Contenedor principal con fondo oscuro y diseño centrado -->
    <div class="container mx-auto bg-black bg-opacity-70 text-white p-8 rounded-lg shadow-lg max-w-xl mt-12">
        <!-- Título de la página -->
        <h1 class="text-3xl font-semibold text-center mb-6">Delete Film</h1>

        <!-- Mensaje de confirmación -->
        <p class="text-center text-lg mb-6">Are you sure you want to delete the film "<strong>{{ $film->title }}</strong>"?</p>

        <!-- Formulario de confirmación -->
        <form action="{{ route('films.confirmDestroy', $film) }}" method="POST" class="space-y-4">
            @csrf
            @method('DELETE')

            <!-- Botón de confirmación de eliminación (rojo) -->
            <div class="flex justify-center">
                <button type="submit" class="bg-red-600 text-white px-6 py-3 text-lg rounded-lg hover:bg-red-700 transition duration-300">
                    Yes, Delete
                </button>
            </div>

            <!-- Botón de cancelación (gris) -->
            <div class="flex justify-center">
                <a href="{{ route('films.index') }}" class="bg-gray-500 text-white px-6 py-3 text-lg rounded-lg hover:bg-gray-600 transition duration-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection

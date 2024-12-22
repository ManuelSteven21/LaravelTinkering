@extends('layouts.app')

@section('title', 'Create Game')

@section('content')
    <!-- Contenedor principal con fondo semitransparente (opaco) -->
    <div class="flex flex-col items-center justify-center py-12 px-6">
        <div class="container mx-auto bg-black bg-opacity-70 text-white p-8 rounded-lg shadow-lg max-w-4xl">
            <!-- Título de la página -->
            <h1 class="text-4xl sm:text-3xl md:text-2xl lg:text-4xl font-semibold mb-6 text-center">Create Game</h1>

            <!-- Formulario de creación -->
            <form action="{{ route('games.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Campo Título -->
                <div class="mb-3">
                    <label for="title" class="block text-lg sm:text-base md:text-sm font-medium">Title</label>
                    <input type="text" name="title" id="title" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm" required>
                </div>

                <!-- Campo Director -->
                <div class="mb-3">
                    <label for="director" class="block text-lg sm:text-base md:text-sm font-medium">Director</label>
                    <input type="text" name="director" id="director" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm" required>
                </div>

                <!-- Campo Genre -->
                <div class="mb-3">
                    <label for="genre" class="block text-lg sm:text-base md:text-sm font-medium">Genre</label>
                    <input type="text" name="genre" id="genre" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm" required>
                </div>

                <!-- Campo Rating -->
                <div class="mb-3">
                    <label for="rating" class="block text-lg sm:text-base md:text-sm font-medium">Rating</label>
                    <input type="text" name="rating" id="rating" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm" required>
                </div>

                <!-- Campo Year -->
                <div class="mb-3">
                    <label for="year" class="block text-lg sm:text-base md:text-sm font-medium">Year</label>
                    <input type="number" name="year" id="year" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm" required>
                </div>

                <!-- Campo Description -->
                <div class="mb-3">
                    <label for="description" class="block text-lg sm:text-base md:text-sm font-medium">Description</label>
                    <textarea name="description" id="description" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm" rows="4" required></textarea>
                </div>

                <!-- Botón Submit -->
                <button type="submit" class="w-full py-3 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 ease-in-out text-lg sm:text-base md:text-sm">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Edit Film')

@section('content')
    <!-- Contenedor principal -->
    <div class="flex flex-col items-center justify-center py-12 px-6">
        <div class="container mx-auto bg-black bg-opacity-70 text-white p-8 rounded-lg shadow-lg max-w-4xl">
            <!-- Título de la página -->
            <h1 class="text-4xl sm:text-3xl md:text-2xl lg:text-4xl font-semibold mb-6 text-center">Edit Film</h1>

            <!-- Formulario de edición -->
            <form action="{{ route('films.update', $film) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Campo Título -->
                <div class="mb-3">
                    <label for="title" class="block text-lg sm:text-base md:text-sm font-medium">Title</label>
                    <input type="text" name="title" id="title" value="{{ $film->title }}" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm text-black" required>
                </div>

                <!-- Campo Director -->
                <div class="mb-3">
                    <label for="director" class="block text-lg sm:text-base md:text-sm font-medium">Director</label>
                    <input type="text" name="director" id="director" value="{{ $film->director }}" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm text-black" required>
                </div>

                <!-- Campo Cast -->
                <div class="mb-3">
                    <label for="cast" class="block text-lg sm:text-base md:text-sm font-medium">Cast</label>
                    <input type="text" name="cast" id="cast" value="{{ $film->cast }}" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm text-black" required>
                </div>

                <!-- Campo Year -->
                <div class="mb-3">
                    <label for="year" class="block text-lg sm:text-base md:text-sm font-medium">Year</label>
                    <input type="number" name="year" id="year" value="{{ $film->year }}" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm text-black" required>
                </div>

                <!-- Campo Description -->
                <div class="mb-3">
                    <label for="description" class="block text-lg sm:text-base md:text-sm font-medium">Description</label>
                    <textarea name="description" id="description" class="form-input mt-2 block w-full rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-lg sm:text-base md:text-sm text-black" rows="4" required>{{ $film->description }}</textarea>
                </div>

                <!-- Botón de retroceso -->
                <div class="flex justify-center">
                    <a href="{{ route('films.index') }}" class="w-full py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-300 ease-in-out text-lg sm:text-base md:text-sm text-center">
                        Cancelar
                    </a>
                </div>

                <!-- Botón Submit -->
                <button type="submit" class="w-full py-3 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 ease-in-out text-lg sm:text-base md:text-sm text-black">
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection

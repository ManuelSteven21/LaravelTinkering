@extends('layouts.app')

@section('title', 'Films List')

@section('content')
    <!-- Contenedor principal con fondo semitransparente (opaco) -->
    <div class="flex flex-col items-center justify-center py-12 px-6">
        <div class="container mx-auto bg-black bg-opacity-70 text-white p-8 rounded-lg shadow-lg max-w-4xl">
            <h1 class="text-4xl font-semibold mb-6 text-center">Films List</h1>

            <!-- Botón para agregar una nueva película -->
            <div class="mb-6">
                <a href="{{ route('films.create') }}" class="inline-flex items-center bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300 ease-in-out">
                    <!-- Icono de añadir película -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14m7-7H5" />
                    </svg>
                    Add Film
                </a>
            </div>

            <!-- Vista para pantallas grandes (más de 640px de ancho) -->
            <div class="hidden sm:block overflow-x-auto">
                <!-- Tabla de películas -->
                <table class="min-w-full bg-white text-gray-800 rounded-lg shadow-lg">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="px-6 py-4 text-left">Title</th>
                        <th class="px-6 py-4 text-left">Director</th>
                        <th class="px-6 py-4 text-left">Year</th>
                        <th class="px-6 py-4 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($films as $film)
                        <tr class="border-t hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $film->title }}</td>
                            <td class="px-6 py-4 truncate" style="max-width: 200px;" title="{{ $film->director }}">{{ $film->director }}</td>
                            <td class="px-6 py-4">{{ $film->year }}</td>

                            <td class="px-6 py-4 flex justify-center space-x-4">
                                <!-- Botón de mostrar -->
                                <a href="{{ route('films.show', $film) }}" class="text-blue-500 hover:text-blue-700">Show more +</a>

                                <!-- Botón de editar con icono -->
                                <a href="{{ route('films.edit', $film) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <img src="{{ asset('assets/edit.png') }}" alt="Edit" class="w-6 h-6">
                                </a>

                                <!-- Botón de eliminar con icono -->
                                <a href="{{ route('films.destroy', $film) }}" class="text-red-500 hover:text-red-700">
                                    <img src="{{ asset('assets/delete.png') }}" alt="Delete" class="w-6 h-6">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Vista alternativa para pantallas pequeñas -->
            <div class="sm:hidden space-y-4">
                @foreach ($films as $film)
                    <!-- Cada película como tarjeta con márgenes y ancho completo -->
                    <div class="bg-white p-4 rounded-lg shadow-lg mb-4 w-full">
                        <h2 class="text-gray-600 font-bold">{{ $film->title }}</h2>
                        <p class="text-gray-600 truncate" title="{{ $film->director }}">{{ $film->director }}</p>
                        <p class="text-gray-500">Year: {{ $film->year }}</p>
                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="{{ route('films.show', $film) }}" class="text-blue-500 hover:text-blue-700">Show more +</a>
                            <a href="{{ route('films.edit', $film) }}">
                                <img src="{{ asset('assets/edit.png') }}" alt="Edit" class="w-6 h-6">
                            </a>
                            <a href="{{ route('films.destroy', $film) }}">
                                <img src="{{ asset('assets/delete.png') }}" alt="Delete" class="w-6 h-6">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

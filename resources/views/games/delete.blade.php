@extends('layouts.app')

@section('title', 'Delete Game')

@section('content')
    <div class="container mx-auto bg-black bg-opacity-70 text-white p-8 rounded-lg shadow-lg max-w-xl mt-12">
        <h1 class="text-3xl font-semibold text-center mb-6">Delete Game</h1>

        <p class="text-center text-lg mb-6">Are you sure you want to delete the game "<strong>{{ $game->title }}</strong>"?</p>

        <form action="{{ route('game.confirmDestroy', $game) }}" method="POST" class="space-y-4">
            @csrf
            @method('DELETE')

            <div class="flex justify-center">
                <button type="submit" class="bg-red-600 text-white px-6 py-3 text-lg rounded-lg hover:bg-red-700 transition duration-300">Yes, Delete</button>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('games.index') }}" class="bg-gray-500 text-white px-6 py-3 text-lg rounded-lg hover:bg-gray-600 transition duration-300">Cancel</a>
            </div>
        </form>
    </div>
@endsection

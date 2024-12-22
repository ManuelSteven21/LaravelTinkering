<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GameController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('films', FilmController::class);
Route::resource('games', GameController::class);
Route::get('films/{film}/delete', [FilmController::class, 'destroy'])->name('films.destroy');
// Ruta DELETE per confirmar i executar la destrucció
Route::delete('films/{film}/confirm-destroy', [FilmController::class, 'confirmDestroy'])->name('films.confirmDestroy');

Route::get('games/{game}/delete', [GameController::class, 'destroy'])->name('games.destroy');
// Ruta DELETE per confirmar i executar la destrucció
Route::delete('games/{game}/confirm-destroy', [GameController::class, 'confirmDestroy'])->name('game.confirmDestroy');

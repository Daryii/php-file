<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Jukebox');
});

Route::get("/home", [WelcomeController::class,"welcome"]);
Route::get("/songs", [SongsController::class,"songs"]);
Route::get("/genre", [GenreController::class,"genre"]);

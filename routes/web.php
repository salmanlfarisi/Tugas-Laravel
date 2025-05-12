<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;

Route::get('/genres', [BookController::class, 'showGenres']);
Route::get('/authors', [BookController::class, 'showAuthors']);

Route::get('/', function () {
    return view('welcome');
});

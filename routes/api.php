<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

Route::get('/genres', [BookController::class, 'showGenres']);
Route::get('/authors', [BookController::class, 'showAuthors']);
Route::get('/books', [BookController::class, 'showBooks']);        
Route::get('/books/{id}', [BookController::class, 'showBook']);     
Route::post('/books', [BookController::class, 'storeBook']);
Route::put('/books/{id}', [BookController::class, 'updateBook']);
Route::delete('/books/{id}', [BookController::class, 'deleteBook']);
Route::get('/genres', [GenreController::class, 'index']);
Route::post('/genres', [GenreController::class, 'store']);
Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);

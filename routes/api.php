<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/genres', [BookController::class, 'showGenres']);
Route::get('/authors', [BookController::class, 'showAuthors']);
Route::get('/books', [BookController::class, 'showBooks']);        
Route::get('/books/{id}', [BookController::class, 'showBook']);     
Route::post('/books', [BookController::class, 'storeBook']);
Route::put('/books/{id}', [BookController::class, 'updateBook']);
Route::delete('/books/{id}', [BookController::class, 'deleteBook']);

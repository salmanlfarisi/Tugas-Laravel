<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

// Route buku tetap seperti sebelumnya
Route::get('/books', [BookController::class, 'showBooks']);
Route::get('/books/{id}', [BookController::class, 'showBook']);
Route::post('/books', [BookController::class, 'storeBook']);
Route::put('/books/{id}', [BookController::class, 'updateBook']);
Route::delete('/books/{id}', [BookController::class, 'deleteBook']);

// Routes publik untuk genres dan authors (bisa index & show)
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);

// Routes yang butuh autentikasi & admin untuk create, update, delete
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'destroy']);
});

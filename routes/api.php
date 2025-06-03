<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

Route::get('/books', [BookController::class, 'showBooks']);
Route::get('/books/{id}', [BookController::class, 'showBook']);
Route::post('/books', [BookController::class, 'storeBook']);
Route::put('/books/{id}', [BookController::class, 'updateBook']);
Route::delete('/books/{id}', [BookController::class, 'deleteBook']);

Route::apiResource('genres', GenreController::class);
Route::apiResource('authors', AuthorController::class);
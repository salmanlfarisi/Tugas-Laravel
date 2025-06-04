<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\TransactionController;

// Routes buku tetap seperti sebelumnya
Route::get('/books', [BookController::class, 'showBooks']);
Route::get('/books/{id}', [BookController::class, 'showBook']);
Route::post('/books', [BookController::class, 'storeBook']);
Route::put('/books/{id}', [BookController::class, 'updateBook']);
Route::delete('/books/{id}', [BookController::class, 'deleteBook']);

// Routes publik untuk genres dan authors (bisa index & show)
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);

// Routes yang butuh autentikasi & admin untuk create, update, delete genres dan authors
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'destroy']);
});

// Routes transaksi

// Admin hanya boleh read all dan delete transaksi
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index']); // read all
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']); // delete transaksi
});

// Customer (autentikasi) boleh create, update, show transaksi
Route::middleware(['auth:sanctum', 'customer'])->group(function () {
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::put('/transactions/{id}', [TransactionController::class, 'update']);
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);
});

<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // GET /api/genres
    public function showGenres()
    {
        $genres = Genre::getAllGenres();
        return response()->json([
            'status' => true,
            'message' => 'Daftar genre berhasil diambil',
            'data' => $genres
        ], 200);
    }

    // GET /api/authors
    public function showAuthors()
    {
        $authors = Author::all();
        return response()->json([
            'status' => true,
            'message' => 'Daftar penulis berhasil diambil',
            'data' => $authors
        ], 200);
    }

    // GET /api/books
    public function showBooks()
    {
        $books = Book::with('author')->get();
        return response()->json([
            'status' => true,
            'message' => 'Daftar buku berhasil diambil',
            'data' => $books
        ], 200);
    }

    // POST /api/books
    public function storeBook(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = Book::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil ditambahkan',
            'data' => $book
        ], 201);
    }

    // GET /api/books/{id}
    public function showBook($id)
    {
        $book = Book::with('author')->find($id);

        if (!$book) {
            return response()->json([
                'status' => false,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail buku ditemukan',
            'data' => $book
        ], 200);
    }

    // PUT /api/books/{id}
    public function updateBook(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['status' => false, 'message' => 'Buku tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'title' => 'string|max:255',
            'author_id' => 'exists:authors,id',
        ]);

        $book->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil diperbarui',
            'data' => $book
        ], 200);
    }

    // DELETE /api/books/{id}
    public function deleteBook($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['status' => false, 'message' => 'Buku tidak ditemukan'], 404);
        }

        $book->delete();

        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil dihapus'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json([
            'status' => true,
            'message' => 'Daftar genre berhasil diambil',
            'data' => $genres
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Genre berhasil ditambahkan',
            'data' => $genre
        ], 201);
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status' => false,
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail genre ditemukan',
            'data' => $genre
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status' => false,
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Genre berhasil diperbarui',
            'data' => $genre
        ], 200);
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status' => false,
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'status' => true,
            'message' => 'Genre berhasil dihapus'
        ], 200);
    }
}

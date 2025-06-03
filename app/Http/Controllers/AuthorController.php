<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return response()->json([
            'status' => true,
            'message' => 'Daftar penulis berhasil diambil',
            'data' => $authors
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Penulis berhasil ditambahkan',
            'data' => $author
        ], 201);
    }

    public function show($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'status' => false,
                'message' => 'Penulis tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail penulis ditemukan',
            'data' => $author
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'status' => false,
                'message' => 'Penulis tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Penulis berhasil diperbarui',
            'data' => $author
        ], 200);
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'status' => false,
                'message' => 'Penulis tidak ditemukan'
            ], 404);
        }

        $author->delete();

        return response()->json([
            'status' => true,
            'message' => 'Penulis berhasil dihapus'
        ], 200);
    }
}

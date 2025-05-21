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
}

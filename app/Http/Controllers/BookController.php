<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
 public function showGenres()
    {
        $genres = Genre::getAllGenres();
        return view('genres', ['genres' => $genres]);
    }

    public function showAuthors()
    {
        $authors = Author::getAllAuthors();
        return view('authors', ['authors' => $authors]);
    }

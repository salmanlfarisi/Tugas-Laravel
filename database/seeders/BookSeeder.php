<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Ambil author ID
        $authors = Author::all();

        Book::insert([
            ['title' => 'Harry Potter and the Philosopher\'s Stone', 'author_id' => $authors[0]->id],
            ['title' => 'A Game of Thrones', 'author_id' => $authors[1]->id],
            ['title' => 'Murder on the Orient Express', 'author_id' => $authors[2]->id],
            ['title' => 'The Hobbit', 'author_id' => $authors[3]->id],
            ['title' => 'The Shining', 'author_id' => $authors[4]->id],
        ]);
    }
}


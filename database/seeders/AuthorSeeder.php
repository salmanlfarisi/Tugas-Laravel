<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        Author::insert([
            ['name' => 'J.K. Rowling'],
            ['name' => 'George R.R. Martin'],
            ['name' => 'Agatha Christie'],
            ['name' => 'J.R.R. Tolkien'],
            ['name' => 'Stephen King'],
        ]);
    }
}


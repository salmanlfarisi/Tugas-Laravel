<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public static function getAllGenres()
    {
        return [
            ['id' => 1, 'name' => 'Fiction'],
            ['id' => 2, 'name' => 'Non-fiction'],
            ['id' => 3, 'name' => 'Science Fiction'],
            ['id' => 4, 'name' => 'Biography'],
            ['id' => 5, 'name' => 'Fantasy'],
        ];
    }
}

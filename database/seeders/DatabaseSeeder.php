<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // kalau mau tetap bikin user test, bisa tetap jalanin ini
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // jalankan seeder author dan book
        $this->call([
            AuthorSeeder::class,
            BookSeeder::class,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => 'user1234',
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin1234',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Inventor',
            'email' => 'inventor@gmail.com',
            'password' => 'inventor1234',
            'role' => 'inventor',
        ]);
    }
}

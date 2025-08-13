<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 random users
        User::factory(5)->create();

        // Create a default admin user
        User::factory()->create([
            'name' => 'Admin Account',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}

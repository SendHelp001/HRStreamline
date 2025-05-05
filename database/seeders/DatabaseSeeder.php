<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // For PostgreSQL, disable foreign key checks by truncating with cascade
        DB::statement('TRUNCATE TABLE users RESTART IDENTITY CASCADE');

        // Seed users table
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ],
        ]);
    }
}

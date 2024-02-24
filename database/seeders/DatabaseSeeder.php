<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('1234'),
            'role' => 'ADMN',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('0000'),
            'role' => 'USER',
        ]);
    }
}

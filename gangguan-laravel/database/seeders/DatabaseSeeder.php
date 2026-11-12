<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'password' => Hash::make('admin789'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'teknisi@example.com'],
            [
                'password' => Hash::make('teknisi789'),
                'role' => 'teknisi',
            ]
        );
    }
}

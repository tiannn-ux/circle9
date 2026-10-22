<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'agustianadipati007@gmail.com'],
            [
                'name' => 'user',
                'password' => Hash::make('102022530061'),
            ]
        );
    }
}
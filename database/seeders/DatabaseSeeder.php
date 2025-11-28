<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario administrador solo si no existe
        User::firstOrCreate(
            ['email' => 'admin@hotel.test'],
            [
                'name' => 'Admin Hotel',
                'password' => bcrypt('12345678'),
            ]
        );
    }
}
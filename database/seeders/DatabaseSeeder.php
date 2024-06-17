<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        User::create([
            'name' => 'Ryan Figueiredo',
            'user_type' => 0, // Assumindo que 0 é um tipo de usuário válido
            'email' => 'ryan.arruda.figueiredo@gmail.com',
            'password' => Hash::make('12341234'),
        ]);
    }
}
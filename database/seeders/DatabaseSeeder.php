<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Votaciones::factory(4)->create();
        \App\Models\Votantes::factory(30)->create();
        \App\Models\Administradores::factory(3)->create();
        \App\Models\PublicoVotacion::factory(15)->create();
        \App\Models\votos::factory(15)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

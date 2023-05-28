<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->times(5)->create();
        Estudiante::factory()->times(15)->create();
        Curso::factory()->times(8)->create()->each(
            function ($curso) {
                $curso->estudiantes()->sync(
                    Estudiante::all()->random(3)
                );
            }

        );
    }
}

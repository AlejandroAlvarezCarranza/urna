<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Votaciones>
 */
class VotacionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_votacion'=>$this->faker->company,
            'fecha_inicio'=>$this->faker->dateTimeBetween('-4 months','-2 months'),
            'fecha_termino'=>$this->faker->dateTimeThisMonth()
        ];
    }
}

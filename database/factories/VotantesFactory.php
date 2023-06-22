<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Votantes>
 */
class VotantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>$this->faker->firstName,
            'apellido_pat'=>$this->faker->lastName,
            'apellido_mat'=>$this->faker->lastName,
            'email'=>$this->faker->email,
            'telefono'=>$this->faker->e164PhoneNumber,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PublicoVotacion>
 */
class PublicoVotacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idvotacion'=>$this->faker->numberBetween(1,3),
            'idvotante'=>$this->faker->numberBetween(1,20)
        ];
    }
}

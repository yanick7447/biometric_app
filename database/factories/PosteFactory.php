<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PosteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name
        ];
    }
}

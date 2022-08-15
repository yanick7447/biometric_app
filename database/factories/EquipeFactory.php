<?php

namespace Database\Factories;

use App\Models\Etat;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        $etatIDs = $this->faker->randomElement(Etat::query()->pluck('id'));
        $userIDs = $this->faker->randomElement(User::query()->pluck('id'));
        $startTime = $this->faker->dateTime();
        return [
            'etat_id' => $etatIDs,
            'user_id' => $userIDs,
            'objectif' => $this->faker->realText,
            'lieu_travail' => $this->faker->streetAddress,
            'long' => $this->faker->longitude,
            'lat' => $this->faker->latitude,
            'debut' => $startTime,
            'fin' => $this->faker->dateTimeBetween($startTime),
            'note' => random_int(1,10),
            'remarque' => $this->faker->realText(10),
        ];
    }
}

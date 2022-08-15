<?php

namespace Database\Factories;

use App\Models\Equipe;
use App\Models\Etat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JourTravailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $equipeIDs = $this->faker->randomElement(Equipe::query()->pluck('id'));
        $etatIDs = $this->faker->randomElement(Etat::query()->pluck('id'));
        $userIDs = $this->faker->randomElement(User::query()->pluck('id'));
        $startTime = $this->faker->dateTime();
        return [
            'equipe_id' => $equipeIDs,
            'etat_id' => $etatIDs,
            'user_id' => $userIDs,
            'objectif' => $this->faker->realText,
            'lieu' => $this->faker->city,
            'debut' => $startTime,
            'fin' => $this->faker->dateTimeBetween($startTime),
            'rapport' => $this->faker->realText,
            'debut_long' => $this->faker->longitude,
            'debut_lat' => $this->faker->latitude,
            'fin_long' => $this->faker->longitude,
            'fin_lat' => $this->faker->latitude,
        ];
    }
}

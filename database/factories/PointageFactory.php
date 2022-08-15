<?php

namespace Database\Factories;

use App\Models\Employe;
use App\Models\Equipe;
use App\Models\JourTravail;
use App\Models\TypePointage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $jourTravailIDs = $this->faker->randomElement(JourTravail::query()->pluck('id'));
        $employeIDs = $this->faker->randomElement(Employe::query()->pluck('id'));
        $userIDs = $this->faker->randomElement(User::query()->pluck('id'));
        $typeIDs = $this->faker->randomElement(TypePointage::query()->pluck('id'));
        $equipeIDs = $this->faker->randomElement(Equipe::query()->pluck('id'));

        return [
            'user_id'=>$userIDs,
            'equipe_id'=>$equipeIDs,
            'employe_id'=>$employeIDs,
            'jour_travail_id'=>$jourTravailIDs,
            'type_id'=>$typeIDs,
            'date_pointage'=>$this->faker->dateTime,
            'long'=>$this->faker->longitude,
            'lat'=>$this->faker->latitude,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Employe;
use App\Models\Equipe;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipeEmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $employeIDs = $this->faker->randomElement(Employe::query()->pluck('id'));
        $equipeIDs = $this->faker->randomElement(Equipe::query()->pluck('id'));
        $roleIDs = $this->faker->randomElement(Role::query()->pluck('id'));
        $userIDs = $this->faker->randomElement(User::query()->pluck('id'));

        return [
            'employe_id'=>$employeIDs,
            'equipe_id'=>$equipeIDs,
            'role_id'=>$roleIDs,
            'user_id'=>$userIDs,
            'statut'=>$this->faker->boolean,
        ];
    }
}

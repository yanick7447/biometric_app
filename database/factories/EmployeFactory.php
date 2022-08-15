<?php

namespace Database\Factories;

use App\Models\Poste;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $roleIDs = $this->faker->randomElement(Role::query()->pluck('id'));
        $postIDs = $this->faker->randomElement(Poste::query()->pluck('id'));
        $userIDs = $this->faker->randomElement(User::query()->pluck('id'));
        $startTime = $this->faker->dateTime();
        return [
            'user_id' => $userIDs,
            'poste_id' => $postIDs,
            'role_id' => $roleIDs,
            'admin_id' => $this->faker->randomElement(User::query()->pluck('id')),
            'debut' => $startTime,
            'fin' => $this->faker->dateTimeBetween($startTime),
            'statut' => $this->faker->boolean,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['male','female']);
        $domain = $this->faker->randomElement(['@gmail.com','@yahoo.fr','@outlook.com','@aut.com']);
        $firstName = $this->faker->firstName($gender);
        $lastName = $this->faker->unique()->lastName;
        return [
            'nom'=>$firstName,
            'prenom'=>$lastName,
            'email'=>$firstName.$lastName.$domain,
            'password'=>Hash::make('password'),
            'matricule'=>Uuid::uuid4(),
            'ddn' => $this->faker->date,
            'cni' => time().$this->faker->unique()->randomDigit(),
            'sexe' => $gender,
            'empreinte1' => $this->faker->linuxPlatformToken,
            'tel1' => $this->faker->unique()->phoneNumber,
            'quartier' => $this->faker->streetAddress(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

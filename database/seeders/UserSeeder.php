<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        $faker = Faker::create();
        User::query()->create([
            'nom' => 'tenas',
            'prenom' => 'steve',
            'cni' => time(),
            'matricule' => $faker->uuid,
            'email' => 'tenas@gmail.com',
            'password' => Hash::make('password'),
            'sexe' => 'male',
            'tel1' => '237653051038',
            'ddn' => now(),
            'quartier' => 'streets',
        ]);
    }
}

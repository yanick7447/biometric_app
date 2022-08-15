<?php

namespace Database\Seeders;

use App\Models\Employe;
use App\Models\Equipe;
use App\Models\EquipeEmploye;
use App\Models\JourTravail;
use App\Models\Pointage;
use App\Models\Poste;
use App\Models\TypePointage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
           EtatSeeder::class,
           RoleSeeder::class,
           UserSeeder::class,
        ]);
         User::factory(10)->create();
         Poste::factory(10)->create();
         TypePointage::factory(10)->create();
         Employe::factory(50)->create();
         Equipe::factory(10)->create();
         EquipeEmploye::factory(10)->create();
         JourTravail::factory(20)->create();
         Pointage::factory(50)->create();
    }
}

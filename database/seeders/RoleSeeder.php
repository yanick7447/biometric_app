<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Role::query()->create(['nom' => 'admin']);
        Role::query()->create(['nom' => 'coordonnateur']);
        Role::query()->create(['nom' => 'chef d’équipe']);
        Role::query()->create(['nom' => 'exécutant']);
    }
}

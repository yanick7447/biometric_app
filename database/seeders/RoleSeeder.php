<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Role::query()->create(['name' => 'admin']);
        Role::query()->create(['name' => 'coordonnateur']);
        Role::query()->create(['name' => 'chef d’équipe']);
        Role::query()->create(['name' => 'exécutant']);
    }
}

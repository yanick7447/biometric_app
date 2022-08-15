<?php

namespace Database\Seeders;

use App\Models\Etat;
use Illuminate\Database\Seeder;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Etat::query()->create(['nom' => 'Active']);
        Etat::query()->create(['nom' => 'Passive']);
    }
}

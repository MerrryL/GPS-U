<?php

namespace Database\Seeders;

use App\Models\Constatation;
use Illuminate\Database\Seeder;

class ConstatationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Constatation::factory()->count(10)->create();
    }
}

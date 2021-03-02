<?php

namespace Database\Seeders;

use App\Models\ObservationField;
use Illuminate\Database\Seeder;

class ObservationFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ObservationField::factory()->count(10)->create();
    }
}

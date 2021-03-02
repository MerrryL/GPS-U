<?php

namespace Database\Seeders;

use App\Models\ObservationDefaultRequest;
use Illuminate\Database\Seeder;

class ObservationDefaultRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ObservationDefaultRequest::factory()->count(10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Referring;
use Illuminate\Database\Seeder;

class ReferringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Referring::factory()->count(10)->create();
    }
}

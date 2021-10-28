<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Codex;

class CodexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Codex::factory()->count(5)->create();
    }
}

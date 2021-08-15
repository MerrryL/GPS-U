<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $files = Storage::disk('images')->directories();
        foreach ($files as $file) {
            Storage::disk('images')->deleteDirectory($file);
        }

        $this->call([
            //FieldTypeSeeder::class,
            UserSeeder::class,
            ConstatationSeeder::class,
        ]);
    }
}

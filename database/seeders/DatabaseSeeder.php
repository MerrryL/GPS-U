<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ConstatationSeeder::class,
            DossierSeeder::class,
            ImageSeeder::class,
            LocalizationSeeder::class,
            //ObservationDefaultRequestSeeder::class,
            ObservationFieldSeeder::class,
            ObservationSeeder::class,
            ObserverSeeder::class,
            ReferringSeeder::class,
            RequestSeeder::class
        ]);
    }
}

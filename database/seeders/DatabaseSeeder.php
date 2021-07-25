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
            FieldGroupSeeder::class,
            FieldTypeSeeder::class,
            ConstatationFieldValueSeeder::class,
            ImageSeeder::class,
            LocalizationSeeder::class,
            ObservationDefaultRequestSeeder::class,
            ObservationSeeder::class,
            ObserverSeeder::class,
            ReferringSeeder::class,
            RequestSeeder::class,
            UserSeeder::class

            /*ObservationFieldSeeder::class,
            ConstatationSeeder::class,*/
        ]);
    }
}

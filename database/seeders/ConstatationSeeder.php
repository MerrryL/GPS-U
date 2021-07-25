<?php

namespace Database\Seeders;

use App\Models\Constatation;
use App\Models\Localization;
use App\Models\Image;
use App\Models\Dossier;
use App\Models\Action;
use App\Models\Observation;
use App\Models\Observer;
use App\Models\ConstatationFieldValue;
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
        Constatation::factory()->count(2)
                    ->create()
                    ->each(function ($constatation) {
                        $constatation->localization()->save(Localization::factory()->make());
                        $constatation->images()->saveMany(Image::factory()->count(2)->make());
                        $constatation->dossiers()->saveMany(Dossier::factory()->count(1)->make());
                        $constatation->actions()->saveMany(Action::Factory()->count(2)->make());
                        $constatation->observers()->saveMany(Observer::factory()->count(2)->make());
                        $constatation->observations()->saveMany(Observation::Factory()->count(3)->make());
                        //$constatation->constatation_field_values()->saveMany(ConstatationFieldValue::Factory()->count(3)->make());
                });
    }
}

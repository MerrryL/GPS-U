<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Log;

use App\Models\Constatation;
use App\Models\Localization;
use App\Models\Image;
use App\Models\Dossier;
use App\Models\Action;
use App\Models\Address;
use App\Models\Coordinate;
use App\Models\Observation;
use App\Models\Observer;
use App\Models\FieldGroup;
use App\Models\Field;
use Illuminate\Database\Seeder;

use Spatie\Geocoder\Geocoder;
use Illuminate\Support\Facades\Storage;

class ConstatationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Constatation::factory()->count(30)
            ->create()
            ->each(function ($constatation) {
                $constatation->localization()->save(Localization::factory()->make());

                $constatation->dossiers()->saveMany(Dossier::factory()->count(1)->make());
                $constatation->actions()->saveMany(Action::Factory()->count(2)->make());
                $constatation->observers()->saveMany(Observer::factory()->count(2)->make());
                $constatation->observations()->saveMany(Observation::Factory()->count(3)->make());

                $k = rand(2, 5);
                for ($i = 0; $i < $k; $i++) {

                    $group = FieldGroup::factory()->make();
                    $constatation->field_groups()->save($group);

                    $l = rand(2, 5);
                    for ($j = 0; $j < $l; $j++) {
                        $field = Field::factory()->make();
                        $group->fields()->save($field);
                    };
                }

                $k = rand(1, 2);
                // for ($i = 0; $i < $k; $i++) {
                //     $image = new Image(['name' => 'sample']);
                //     $constatation->images()->save($image);

                //     $files = Storage::disk('samples')->allFiles();
                //     $randomFile = $files[rand(0, count($files) - 1)];

                //     $image->addMediaFromDisk($randomFile, 'samples')->preservingOriginal()->toMediaCollection();
                // }
            });
    }
}

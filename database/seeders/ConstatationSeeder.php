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
use App\Models\FieldType;
use App\Models\ConstatationFieldValue;
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
        Constatation::factory()->count(100)
            ->create()
            ->each(function ($constatation) {
                $localization = Localization::factory()->make();
                $constatation->localization()->save($localization);

                $coords = Coordinate::factory()->make();
                $localization->coordinate()->save($coords);

                $client = new \GuzzleHttp\Client([
                    'verify' => base_path('cacert.pem'),
                ]);

                // $geocoder = new Geocoder($client);
                // $geocoder->setApiKey(config('geocoder.key'));
                // $geocoder->setLanguage(config('geocoder.language'));
                // $geocoder->setRegion(config('geocoder.region'));
                // $geocoder->setBounds(config('geocoder.bounds'));

                // $address = $geocoder->getAddressForCoordinates($coords['latitude'], $coords['longitude']);


                // $address = new Address([
                //     'formatted_address' => $address['formatted_address'],
                //     'place_id' => $address['place_id'],


                // ]);
                // Log::info($address);

                // $localization->address()->save($address);





                $constatation->dossiers()->saveMany(Dossier::factory()->count(1)->make());
                $constatation->actions()->saveMany(Action::Factory()->count(2)->make());
                $constatation->observers()->saveMany(Observer::factory()->count(2)->make());
                $constatation->observations()->saveMany(Observation::Factory()->count(3)->make());

                // $group = FieldGroup::factory()->make();
                // Log::info($group);
                // $constatation->field_groups()->save($group);
                // Log::info($group);
                $k = rand(1, 5);
                for ($i = 0; $i < $k; $i++) {

                    $group = FieldGroup::factory()->make();
                    $constatation->field_groups()->save($group);

                    $l = rand(1, 5);
                    for ($j = 0; $j < $l; $j++) {
                        $fieldType = FieldType::factory()->make();
                        $group->field_types()->save($fieldType);


                        $value = ConstatationFieldValue::factory()->make();
                        $fieldType->constatation_field_value()->save($value);
                    };
                }

                $k = rand(1, 2);
                for ($i = 0; $i < $k; $i++) {
                    $image = new Image(['name' => 'sample']);
                    $constatation->images()->save($image);

                    $files = Storage::disk('samples')->allFiles();
                    $randomFile = $files[rand(0, count($files) - 1)];

                    $image->addMediaFromDisk($randomFile, 'samples')->preservingOriginal()->toMediaCollection();
                }
            });
    }
}

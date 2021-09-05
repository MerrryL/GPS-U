<?php

namespace Database\Factories;

use App\Models\Localization;
use App\Models\Constatation;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocalizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Localization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'given_name' => 'at_creation'
        ];

                // $client = new \GuzzleHttp\Client([
        //     'verify' => base_path('cacert.pem'),
        // ]);

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
    }
}

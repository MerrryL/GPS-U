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
            'given_name' => 'at_creation',
            'latitude' => '50.509317',
            'longitude' => '3.590973'
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Coordinate;
use App\Models\Localization;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoordinateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coordinate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'longitude' => $this->faker->longitude($min = 50.49, $max = 50.53),
            'latitude' => $this->faker->latitude($min = 3.57, $max = 3.59),
        ];
    }
}
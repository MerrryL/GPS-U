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
            'longitude'=> $this->faker->longitude($min = 50.49, $max = 50.53),
            'latitude'=> $this->faker->latitude($min = 3.57, $max = 3.59),
            'constatation_id' => function() {
                return Constatation::factory()->create()->id;
            },
        ];
    }
}

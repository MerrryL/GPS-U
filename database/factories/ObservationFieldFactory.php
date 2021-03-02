<?php

namespace Database\Factories;

use App\Models\ObservationField;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObservationFieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ObservationField::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->word,
            'type'=> $this->faker->word
        ];
    }
}

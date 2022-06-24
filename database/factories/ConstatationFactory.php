<?php

namespace Database\Factories;

use App\Models\Constatation;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ConstatationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Constatation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text,
            'is_validated' => $this->faker->boolean,
            'validation_date' => $this->faker->dateTime($max = 'now', $timezone = null),
            'requires_validation' => $this->faker->boolean,
            'requires_validation_date' => $this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}

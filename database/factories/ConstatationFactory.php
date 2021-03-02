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
            'comment'=> $this->faker->text,
            'isValidated'=> $this->faker->boolean,
            'validationDate'=> $this->faker->dateTime($max = 'now', $timezone = null),
            'requiresValidation'=> $this->faker->boolean,
            'requiresValidationDate'=> $this->faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}

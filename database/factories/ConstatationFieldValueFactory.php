<?php

namespace Database\Factories;

use App\Models\ConstatationFieldValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConstatationFieldValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConstatationFieldValue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'field_type_id' => function() {
                return rand(0,6);
            },
            'value'=> $this->faker->text()
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Referring;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferringFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Referring::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'isAgent'=> $this->faker->boolean
        ];
    }
}

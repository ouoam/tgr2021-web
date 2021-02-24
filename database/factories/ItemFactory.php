<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(
                ['lime_normal', 'lime_normal', 'lime_normal', 'lime_small', 'lime_small', 'pingpong']
            ),
            'size' => $this->faker->randomFloat(2, 36, 50),
            'created_at' => $this->faker->dateTimeInInterval('0 hours', '+1 hours')
        ];
    }
}

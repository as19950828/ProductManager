<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->lexify('商品????'),
            'description' => $this->faker->realText(200),
            'price' => (int)($this->faker->numberBetween(10, 999) . '0'),
            'category_id' => $this->faker->numberBetween(1, 3),
            'maker_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

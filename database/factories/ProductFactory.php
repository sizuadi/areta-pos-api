<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetName(),
            'price' => $this->faker->randomFloat(null, 1000000, 10000000),
            'description' => $this->faker->realText(100),
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Bezhanov\Faker\Provider\Commerce;
use Illuminate\Support\Facades\Http;

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
        $faker = \Faker\Factory::create();
        $faker->addProvider(new Commerce($faker));
        $response = Http::get('https://source.unsplash.com/random');

        return [
            'name' => $faker->productName,
            'description' => $faker->realText,
            'price' => $this->faker->numberBetween(100000, 500000),
            'stock' => $this->faker->numberBetween(0, 20),
            'image' => $response->effectiveUri(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Bezhanov\Faker\Provider\Commerce;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
            "id" => Str::uuid(36),
            'name' => $faker->productName,
            'description' => $faker->realText,
            'price' => $this->faker->numberBetween(100000, 500000),
            'stock' => $this->faker->numberBetween(0, 20),
            'image' => $response->effectiveUri(),
            'user_id' => User::all()->random()->id,
            'product_category_id' => ProductCategory::all()->random()->id,
        ];
    }
}

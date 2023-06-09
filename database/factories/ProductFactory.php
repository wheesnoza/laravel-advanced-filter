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
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['スウェット', 'Tシャツ', 'Yシャツ', 'ジャケット', 'デニムパンツ', 'スラックス']),
            'description' => fake()->text(),
            'brand' => fake()->randomElement(['GU', 'H&M', 'UNIQLO', '無印良品']),
            'free_shipping' => fake()->boolean(),
        ];
    }
}

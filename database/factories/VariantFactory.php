<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => fake()->randomFloat(2, 3000, 50000),
            'raiting' => fake()->randomFloat(1, 0.1, 5),
            'color' => fake()->colorName(),
            'size' => fake()->randomElement(['S', 'M', 'L', 'LL', 'XXL']),
        ];
    }
}

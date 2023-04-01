<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Uzsakymas>
 */
class UzsakymasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'data' => now(),
            'vieta' => fake()->city(),
            'papildoma' => Str::random(10),
            'kontaktinisnumeris' => Str::random(10), // password
            'sventestipas' => Str::random(10),
            'kontaktinisasmuo' => fake()->name()
        ];
    }
}

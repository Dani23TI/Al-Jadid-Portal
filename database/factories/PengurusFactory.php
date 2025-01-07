<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengurus>
 */
class PengurusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim'=>fake()->unique()->randomNumber(8),
            'nama'=>fake()->name(),
            'email'=>fake()->email(),
            'department'=>fake()->randomElement(['Danus','Kaderisasi','Media']),
            'kelas'=>fake()->randomElement(['TRK','TI','SI']),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poli>
 */
class PoliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $poliNames = ['Poli Umum', 'Poli Gigi', 'Poli Anak', 'Poli Kesehatan Ibu', 'Poli THT', 'Poli Kulit'];
        return [
            'no_poli'=>fake()->unique()->randomNumber(8),
            'namapoli' => fake()->randomElement($poliNames),
            'biaya' => fake()->numberBetween(50000, 200000),
            'keterangan' => fake()->sentence(),
        ];
    }
}

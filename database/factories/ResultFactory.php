<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'time'            => fake()->numberBetween(1, 100),
			'total_points'    => fake()->numberBetween(1, 100),
			'mistakes'        => fake()->numberBetween(1, 100),
			'correct_answers' => fake()->numberBetween(1, 100),
		];
	}
}

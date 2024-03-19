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
			'time'            => $this->generateRandomNum(),
			'total_points'    => $this->generateRandomNum(),
			'mistakes'        => $this->generateRandomNum(),
			'correct_answers' => $this->generateRandomNum(),
		];
	}

	private function generateRandomNum()
	{
		return fake()->numberBetween(1, 100);
	}
}

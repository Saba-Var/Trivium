<?php

namespace Database\Factories;

use App\Enums\QuizDifficulty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'title'       => fake()->sentence(5),
			'description' => fake()->text(),
			'time'        => fake()->numberBetween(1, 60),
			'difficulty'  => fake()->randomElement([QuizDifficulty::EASY, QuizDifficulty::MEDIUM, QuizDifficulty::HARD]),
		];
	}
}

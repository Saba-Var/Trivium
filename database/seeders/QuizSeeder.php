<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$categories = Category::all();

		Quiz::factory(30)->create();

		$allQuizzes = Quiz::all();

		$allQuizzes->each(function ($quiz) use ($categories) {
			$quiz->categories()->attach(
				$categories->random(rand(1, 3))->pluck('id')->toArray()
			);
		});
	}
}

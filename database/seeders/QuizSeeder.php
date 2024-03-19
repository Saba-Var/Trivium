<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$categories = Category::all();

		$allQuizzes = Quiz::factory(30)->create();

		$allQuizzes->each(function ($quiz) use ($categories) {
			$quiz->categories()->attach(
				$categories->random(rand(1, 3))->pluck('id')->toArray()
			);

			$questions = Question::factory(rand(10, 40))->create([
				'quiz_id' => $quiz->id,
			]);

			$questions->each(function ($question) {
				$answers = Answer::factory(rand(3, 6))->create([
					'question_id' => $question->id,
				]);

				$correctAnswersCount = $answers->filter(function ($answer) {
					return $answer->point > 0;
				})->count();

				$question->update([
					'has_multiple_answers' => $correctAnswersCount > 1,
				]);
			});
		});
	}
}

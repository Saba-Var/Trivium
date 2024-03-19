<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;
use App\Models\Result;
use App\Models\User;

class ResultSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$users = User::all();
		$quizzes = Quiz::all();

		$users->each(function ($user) use ($quizzes) {
			Result::factory(random_int(0, 10))->create([
				'user_id' => $user->id,
				'quiz_id' => $quizzes->random()->id,
			]);
		});
	}
}

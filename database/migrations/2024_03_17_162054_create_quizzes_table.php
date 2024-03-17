<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\QuizDifficulty;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('quizzes', function (Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('title')->unique();
			$table->text('description');
			$table->enum('difficulty', [QuizDifficulty::EASY, QuizDifficulty::MEDIUM, QuizDifficulty::HARD]);
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('quizzes');
	}
};

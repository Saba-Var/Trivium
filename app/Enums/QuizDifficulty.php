<?php

namespace App\Enums;

class QuizDifficulty
{
	const EASY = 'easy';

	const MEDIUM = 'medium';

	const HARD = 'hard';

	const Lables = [
		self::EASY   => 'Easy',
		self::MEDIUM => 'Medium',
		self::HARD   => 'Hard',
	];
}

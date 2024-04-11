<?php

namespace App\Enums;

class QuizDifficulty
{
	const EASY = 'easy';

	const MEDIUM = 'medium';

	const HARD = 'hard';

	const Labels = [
		self::EASY   => 'Easy',
		self::MEDIUM => 'Medium',
		self::HARD   => 'Hard',
	];

	const QUERY_FILTER_VALUE = self::EASY . ',' . self::MEDIUM . ',' . self::HARD;
}

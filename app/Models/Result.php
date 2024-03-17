<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	use HasFactory;

	protected $fillable = [
		'user_id',
		'quiz_id',
		'time',
		'total_points',
		'mistakes',
		'correct_answers',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function quiz()
	{
		return $this->belongsTo(Quiz::class);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
	use HasFactory;

	protected $fillable = [
		'text',
		'has_multiple_answers',
		'quiz_id',
	];

	public function quiz(): BelongsTo
	{
		return $this->belongsTo(Quiz::class);
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	use HasFactory;

	protected $fillable = [
		'question_id',
		'point',
	];

	public function question(): BelongsTo
	{
		return $this->belongsTo(Question::class);
	}
}

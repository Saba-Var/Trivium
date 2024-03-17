<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'difficulty',
		'description',
		'time',
	];

	public function categories(): BelongsToMany
	{
		return $this->belongsToMany(Category::class);
	}

	public function questions(): HasMany
	{
		return $this->hasMany(Question::class);
	}

	public function results(): HasMany
	{
		return $this->hasMany(Result::class);
	}
}

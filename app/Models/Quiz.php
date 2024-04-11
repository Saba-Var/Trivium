<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
	use HasFactory;

	protected $fillable = [
		'description',
		'difficulty',
		'title',
		'time',
	];

	public function scopeDifficulties(Builder $query, array|string $difficulties): Builder
	{
		return $query->whereIn('difficulty', (array) $difficulties);
	}

	public function scopeCompletedByUser(Builder $query): Builder
	{
		$completedFilterValue = request()->query('filter')['completed'] ?? null;
		$userId = auth()->id();

		if ($completedFilterValue === 'true') {
			return $query->whereHas('results', function ($query) use ($userId) {
				$query->where('user_id', $userId);
			});
		}

		return $query->whereDoesntHave('results', function ($query) use ($userId) {
			$query->where('user_id', $userId);
		});
	}

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Quiz extends Model
{
	use HasFactory;

	protected $fillable = [
		'description',
		'difficulty',
		'title',
		'time',
	];

	public function scopeCreatedAt(Builder $query): Builder
	{
		$order = request()->input('created_at');
		return $query->orderBy('created_at', $order ?? 'asc');
	}

	public function scopeMostPopular(Builder $query): Builder
	{
		return $query->when(request()->input('most_popular'), function ($query) {
			return $query->withCount('results')->orderBy('results_count', 'desc');
		});
	}

	public function scopeTitleOrder(Builder $query): Builder
	{
		return $query->when(request()->input('title'), function ($query) {
			$order = request()->input('title');
			return $query->orderBy('title', $order ?? 'asc');
		});
	}

	public function scopeDifficulties(Builder $query, Collection $filters): Builder
	{
		return  $query->when($filters->has('difficulty'), function ($query) use ($filters) {
			return $query->whereIn('difficulty', $filters->get('difficulty'));
		});
	}

	public function scopeCompletedByUser(Builder $query, Collection $filters): Builder
	{
		return $query->when($filters->has('completed'), function ($query) use ($filters) {
			$userId = auth()->id();
			$completed = $filters->get('completed')[0] === 'true';

			if ($completed) {
				return $query->whereHas('results', function ($query) use ($userId) {
					$query->where('user_id', $userId);
				});
			}

			return $query->whereDoesntHave('results', function ($query) use ($userId) {
				$query->where('user_id', $userId);
			});
		});
	}

	public function scopeCategories(Builder $query, Collection $filters): Builder
	{
		return $query->when($filters->has('categories'), function ($query) use ($filters) {
			$categories = $filters->get('categories');
			return $query->whereHas('categories', function ($query) use ($categories) {
				$query->whereIn('category_id', (array) $categories);
			});
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

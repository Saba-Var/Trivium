<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Http\Traits\QueryFilters;
use App\Models\Quiz;

class QuizController extends Controller
{
	use QueryFilters;

	public function index()
	{
		$filter = $this->getCollectionOfQueryFilters();

		$pageSize = request()->query()['pageSize'] ?? 10;

		if (count($filter) == 0) {
			return QuizResource::collection(Quiz::paginate($pageSize));
		}

		$query = Quiz::query();

		$query->when($filter->has('difficulty'), function ($query) use ($filter) {
			return $query->whereIn('difficulty', $filter->get('difficulty'));
		});

		$query->when($filter->has('completed'), function ($query) use ($filter) {
			return $query->completedByUser($filter->get('completed')[0] === 'true');
		});

		$query->when($filter->has('categories'), function ($query) use ($filter) {
			return $query->categories($filter->get('categories'));
		});

		$quizzes = $query->paginate($pageSize);

		return QuizResource::collection($quizzes);
	}
}

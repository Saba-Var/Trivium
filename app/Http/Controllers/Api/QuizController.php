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
		$filters = $this->getCollectionOfQueryFilters();

		$pageSize = request()->query()['pageSize'] ?? 10;

		if (count($filters) == 0) {
			return QuizResource::collection(Quiz::paginate($pageSize));
		}

		$query = Quiz::query();

		$query->difficulties($filters)
			  ->completedByUser($filters)
			  ->categories($filters);

		return QuizResource::collection($query->paginate($pageSize));
	}
}

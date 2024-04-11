<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuizzesRequest;
use App\Http\Resources\QuizResource;
use App\Http\Traits\QueryFilters;
use App\Models\Quiz;

class QuizController extends Controller
{
	use QueryFilters;

	public function index(QuizzesRequest $request): AnonymousResourceCollection
	{
		$filters = $this->getCollectionOfQueryFilters();

		$pageSize = request()->query()['pageSize'] ?? 10;

		if (count($filters) == 0) {
			return QuizResource::collection(Quiz::paginate($pageSize));
		}

		$query = Quiz::query();

		$query->difficulties($filters)
			  ->completedByUser($filters)
			  ->categories($filters)
			  ->createdAt()
			  ->mostPopular()
			  ->titleOrder();

		return QuizResource::collection($query->paginate($pageSize));
	}
}

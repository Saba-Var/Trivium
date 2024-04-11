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
		$filter = $this->turnIntoQueryFilters(['difficulty']);

		if (count($filter) == 0) {
			return QuizResource::collection(Quiz::paginate(10));
		}

		$query = Quiz::query();

		$query->when($filter->has('difficulty'), function ($query) use ($filter) {
			return $query->whereIn('difficulty', $filter->get('difficulty'));
		});

		$query->when($filter->has('completed'), function ($query) use ($filter) {
			return $query->completedByUser();
		});

		$quizzes = $query->paginate(10);

		return QuizResource::collection($quizzes);
	}
}

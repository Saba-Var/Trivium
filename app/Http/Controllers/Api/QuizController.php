<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuizResource;
use App\Models\Quiz;

class QuizController extends Controller
{
	public function index()
	{
		$filter = request()->query();

		$difficulties = $filter['filter']['difficulty'];

		$difficulties = explode(',', $difficulties);

		$quizzes = Quiz::when($difficulties, function ($query) use ($difficulties) {
			return $query->difficulties($difficulties);
		})->get();

		return QuizResource::collection($quizzes);
	}
}

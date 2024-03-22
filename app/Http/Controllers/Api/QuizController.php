<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quiz;

class QuizController extends Controller
{
	public function index()
	{
		$quizzes = Quiz::all();

		return response()->json($quizzes);
	}
}

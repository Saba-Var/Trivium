<?php

namespace App\Http\Requests;

use App\Enums\QuizDifficulty;
use Illuminate\Foundation\Http\FormRequest;

class QuizzesRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'pageSize'                   => ['nullable', 'max:30', 'min:1', 'integer'],
			'filter.difficulty'          => ['nullable', 'string', 'in:' . QuizDifficulty::QUERY_FILTER_VALUE],
			'filter.completed'           => ['nullable', 'string', 'in:true,false'],
			'filter.categories'          => ['nullable', 'string'],
			'created_at'                 => ['nullable', 'string', 'in:asc,desc'],
			'most_popular'               => ['nullable', 'string', 'in:true,false'],
			'title'                      => ['nullable', 'string', 'in:asc,desc'],
		];
	}
}

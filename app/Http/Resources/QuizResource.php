<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(Request $request): array
	{
		return [
			'id'                => $this->id,
			'title'             => $this->title,
			'description'       => $this->description,
			'difficulty'        => $this->difficulty,
			'time'              => $this->time,
			'users_count'       => $this->results->count(),
			'user_result'       => $this->results->where('user_id', auth()->id())->first(),
		];
	}
}

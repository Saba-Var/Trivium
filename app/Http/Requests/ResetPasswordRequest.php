<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'password'              => ['required', 'string', 'confirmed', 'min:4', 'max:20'],
			'email'                 => ['required', 'email:strict', 'exists:users,email'],
			'token'                 => ['required', 'string'],
		];
	}
}

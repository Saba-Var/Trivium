<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'username'                     => ['required', 'string', 'unique:users', 'min:3', 'max:20'],
			'email'                        => ['required', 'email:strict', 'unique:users'],
			'password'                     => ['required', 'string', 'confirmed', 'min:4', 'max:20'],
		];
	}
}

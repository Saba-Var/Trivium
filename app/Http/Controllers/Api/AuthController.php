<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SignUpRequest;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class AuthController extends Controller
{
	public function signUp(SignUpRequest $request): JsonResponse
	{
		$data = $request->validated();

		$user = User::create($data);

		event(new Registered($user));

		Auth::loginUsingId($user->id);

		return response()->json([
			'message' => 'Successfully created user!',
		], 201);
	}

	public function emailVerify(EmailVerificationRequest $request): JsonResponse
	{
		$request->fulfill();

		return response()->json([
			'message' => 'Email verified!',
		], 200);
	}
}

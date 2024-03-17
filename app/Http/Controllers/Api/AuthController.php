<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SignUpRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
	public function signUp(SignUpRequest $request): JsonResponse
	{
		$data = $request->validated();

		$user = User::create($data);

		event(new Registered($user));

		Auth::loginUsingId($user->id);

		$this->regenerateSession($request);

		return response()->json([
			'message' => 'Successfully created user! Please verify your email.',
		], 201);
	}

	public function emailVerify(EmailVerificationRequest $request): JsonResponse
	{
		$request->fulfill();

		return response()->json([
			'message' => 'Email verified!',
		], 200);
	}

	public function logIn(LoginRequest $request): JsonResponse
	{
		$credentials = $request->validated();

		$user = $this->getUserWithVerifiedEmail($credentials['email']);

		$isMatch = $user && password_verify($credentials['password'], $user->password);

		if ($isMatch) {
			Auth::loginUsingId($user->id, array_key_exists('remember', $credentials) ? true : false);
			$this->regenerateSession($request);

			return response()->json([
				'message' => 'Logged in!',
			], 200);
		}

		return response()->json([
			'email'    => 'The provided credentials are incorrect.',
			'password' => 'The provided credentials are incorrect.',
		], 401);
	}

	public function logOut(Request $request, User $user): JsonResponse
	{
		auth()->guard('web')->logout();

		$request->session()->invalidate();
		$this->regenerateSession($request);

		return response()->json([
			'message' => 'Logged out!',
		], 200);
	}

	private function regenerateSession(Request $request): void
	{
		$request->session()->regenerate();
		$request->session()->regenerateToken();
	}

	private function getUserWithVerifiedEmail($email): User|null
	{
		return User::where('email', $email)->whereNotNull('email_verified_at')->first();
	}
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use App\Http\Traits\VerifiedUser;
use Illuminate\Support\Str;
use App\Models\User;

class PasswordController extends Controller
{
	use VerifiedUser;

	public function forgotPassword(ForgotPasswordRequest $request): JsonResponse
	{
		$data = $request->validated();

		$user = $this->getUserWithVerifiedEmail($data['email']);

		$status = Password::sendResetLink($user->only('email'));

		if ($status === Password::RESET_LINK_SENT) {
			return response()->json([
				'message' => 'Reset link sent!',
			], 200);
		}

		return response()->json([
			'message' => 'Reset link not sent!',
		], 500);
	}

	public function resetPassword(ResetPasswordRequest $request): JsonResponse
	{
		$data = $request->validated();

		$status = Password::reset(
			$data,
			function (User $user, string $password) {
				$user->forceFill([
					'password' => Hash::make($password),
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		if ($status === Password::PASSWORD_RESET) {
			return response()->json([
				'message' => 'Password reset successfully!',
			]);
		}

		return response()->json([
			'message' => 'Password reset failed!',
		], 500);
	}
}

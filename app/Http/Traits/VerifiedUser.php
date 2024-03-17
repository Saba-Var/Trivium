<?php

namespace App\Http\Traits;

use App\Models\User;

trait VerifiedUser
{
	public function getUserWithVerifiedEmail($email): User|null
	{
		return User::where('email', $email)->whereNotNull('email_verified_at')->first();
	}
}

<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		ResetPassword::createUrlUsing(function (User $user, string $token) {
			return config('app.client_url') . "/auth/reset-password?token={$token}&email={$user->email}";
		});
	}
}
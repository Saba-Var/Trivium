<?php

namespace App\Providers;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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

		VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
			return (new MailMessage)
			->subject('Verify Email Address')
			->line('Click the button below to verify your email address.')
			->action('Verify Email Address', env('CLIENT_URL') . '/auth/log-in?emailVerificationUrl=' . $url);
		});
	}
}

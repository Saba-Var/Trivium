<?php

namespace App\Providers;

use Laravel\Nova\NovaApplicationServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuSection;
use Illuminate\Http\Request;
use Laravel\Nova\Nova;
use App\Nova\Category;
use App\Nova\Quiz;
use App\Nova\Result;
use App\Nova\User;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();

		Nova::withBreadcrumbs(true);

		Nova::mainMenu(function (Request $request) {
			return [
				MenuSection::resource(Quiz::class)->icon('document-text'),
				MenuSection::resource(Category::class)->icon('tag'),
				MenuSection::resource(Result::class)->icon('document'),
				MenuSection::resource(User::class)->icon('user-group'),
			];
		});
	}

	/**
	 * Register the Nova routes.
	 *
	 * @return void
	 */
	protected function routes()
	{
		Nova::routes()
				->withAuthenticationRoutes()
				->withPasswordResetRoutes()
				->register();
	}

	/**
	 * Register the Nova gate.
	 *
	 * This gate determines who can access Nova in non-local environments.
	 *
	 * @return void
	 */
	protected function gate()
	{
		Gate::define('viewNova', function ($user) {
			return in_array($user->email, [
			]);
		});
	}

	/**
	 * Get the dashboards that should be listed in the Nova sidebar.
	 *
	 * @return array
	 */
	protected function dashboards()
	{
		return [
			new \App\Nova\Dashboards\Main,
		];
	}

	/**
	 * Get the tools that should be listed in the Nova sidebar.
	 *
	 * @return array
	 */
	public function tools()
	{
		return [];
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
	}
}

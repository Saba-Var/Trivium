<?php

namespace App\Providers;

use Laravel\Nova\NovaApplicationServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Menu\MenuItem;
use Illuminate\Http\Request;
use Laravel\Nova\Nova;
use App\Nova\Category;
use App\Nova\Quiz;
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

		Nova::mainMenu(function (Request $request) {
			return [
				MenuSection::make('Quiz', [
					MenuItem::resource(Quiz::class),
				])->icon('document-text')->collapsable(),

				MenuSection::make('Category', [
					MenuItem::resource(Category::class),
				])->icon('tag')->collapsable(),

				MenuSection::make('User', [
					MenuItem::resource(User::class),
				])->icon('user-group')->collapsable(),
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

<?php

namespace App\Nova;

use App\Enums\QuizDifficulty as QuizDifficultyEnum;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\ID;

class Quiz extends Resource
{
	/**
	 * The model the resource corresponds to.
	 *
	 * @var class-string<\App\Models\Quiz>
	 */
	public static $model = \App\Models\Quiz::class;

	/**
	 * The single value that should be used to represent the resource when being displayed.
	 *
	 * @var string
	 */
	public static $title = 'title';

	/**
	 * The columns that should be searched.
	 *
	 * @var array
	 */
	public static $search = [
		'id',
		'title',
	];

	/**
	 * Get the fields displayed by the resource.
	 *
	 * @param \Laravel\Nova\Http\Requests\NovaRequest $request
	 *
	 * @return array
	 */
	public function fields(NovaRequest $request)
	{
		return [
			ID::make()->sortable(),

			Text::make('Title')
				->sortable()
				->rules('required', 'max:100', 'min:3'),

			Number::make('Time')
				->sortable()
				->rules('required', 'min:1', 'max:60', 'integer'),

			Select::make('difficulty')
				->options(QuizDifficultyEnum::Lables)
				->displayUsingLabels()
				->sortable()
				->rules('required'),

			Trix::make('Description')
				->sortable()
				->rules('required', 'max:255', 'min:4'),

			BelongsToMany::make('Categories'),
		];
	}

	/**
	 * Get the cards available for the request.
	 *
	 * @param \Laravel\Nova\Http\Requests\NovaRequest $request
	 *
	 * @return array
	 */
	public function cards(NovaRequest $request)
	{
		return [];
	}

	/**
	 * Get the filters available for the resource.
	 *
	 * @param \Laravel\Nova\Http\Requests\NovaRequest $request
	 *
	 * @return array
	 */
	public function filters(NovaRequest $request)
	{
		return [];
	}

	/**
	 * Get the lenses available for the resource.
	 *
	 * @param \Laravel\Nova\Http\Requests\NovaRequest $request
	 *
	 * @return array
	 */
	public function lenses(NovaRequest $request)
	{
		return [];
	}

	/**
	 * Get the actions available for the resource.
	 *
	 * @param \Laravel\Nova\Http\Requests\NovaRequest $request
	 *
	 * @return array
	 */
	public function actions(NovaRequest $request)
	{
		return [];
	}
}

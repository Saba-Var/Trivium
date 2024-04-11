<?php

namespace App\Http\Traits;

use Illuminate\Support\Collection;

trait QueryFilters
{
	public function turnIntoQueryFilters(array $scopeFilters): Collection
	{
		$scopeFilters = collect($scopeFilters);

		$filterQueries = request()->query()['filter'] ?? [];

		$filterQueries = array_filter($filterQueries, function ($filterQuery) {
			return $filterQuery !== '' && $filterQuery !== null;
		});

		$filterQueries = collect($filterQueries)->map(function ($filterQuery) {
			return explode(',', $filterQuery);
		});

		return $filterQueries;
	}
}

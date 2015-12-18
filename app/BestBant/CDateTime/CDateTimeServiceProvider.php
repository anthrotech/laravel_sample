<?php

namespace BestBant\CDateTime;

use Illuminate\Support\ServiceProvider;

class CDateTimeServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('cdatetime', 'BestBant\CDateTime\CDateTime');
	}

} 
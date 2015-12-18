<?php

namespace BestBant\Facades;

use Illuminate\Support\Facades\Facade;

class CDateTime extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'cdatetime';
	}

} 
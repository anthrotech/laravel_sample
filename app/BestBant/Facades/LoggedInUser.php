<?php

namespace BestBant\Facades;

use Illuminate\Support\Facades\Facade;

class LoggedInUser extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'liu';
	}

} 
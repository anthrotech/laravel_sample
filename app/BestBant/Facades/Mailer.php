<?php

namespace BestBant\Facades;

use Illuminate\Support\Facades\Facade;

class Mailer extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'mailer';
	}

} 
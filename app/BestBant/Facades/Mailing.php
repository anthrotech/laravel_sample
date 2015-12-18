<?php

namespace BestBant\Facades;

use Illuminate\Support\Facades\Facade;

class Mailing extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'mailing';
	}

} 
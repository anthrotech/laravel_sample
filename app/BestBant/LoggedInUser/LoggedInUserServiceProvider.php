<?php

namespace BestBant\LoggedInUser;

use Illuminate\Support\ServiceProvider;

class LoggedInUserServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('liu', 'BestBant\LoggedInUser\LoggedInUser');
	}

}
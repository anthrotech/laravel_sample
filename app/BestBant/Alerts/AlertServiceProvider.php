<?php

namespace BestBant\Alerts;

use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('alert', 'BestBant\Alerts\Alert');
	}

} 
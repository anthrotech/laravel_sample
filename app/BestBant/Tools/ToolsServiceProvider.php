<?php

namespace BestBant\Tools;

use Illuminate\Support\ServiceProvider;

class ToolsServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('tools', 'BestBant\Tools\Tools');
	}

} 

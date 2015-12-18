<?php

namespace BestBant\Mailers;

use Illuminate\Support\ServiceProvider;

class MailingServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('mailing', 'BestBant\Mailers\Mailing');
	}

} 
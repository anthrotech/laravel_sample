<?php

namespace BestBant\Mailers;

use Illuminate\Support\ServiceProvider;

class MailerServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('mailer', 'BestBant\Mailers\Mailer');
	}

} 
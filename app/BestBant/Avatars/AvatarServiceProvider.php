<?php

namespace BestBant\Avatars;

use Illuminate\Support\ServiceProvider;

class AvatarServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('avatar', 'BestBant\Avatars\Avatar');
	}

} 
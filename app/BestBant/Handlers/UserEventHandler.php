<?php

namespace BestBant\Handlers;

use BestBant\Mailers\Mailer, Exception;
use User, Profile;

class UserEventHandler {

	public function onSignUp($data) {

	}


	public function onCancel() {
		return 'the user cancelded';
	}


	public function subscribe($events) {
		$events->listen('user.signup', 'BestBant\Handlers\UserEventHandler@onSignUp');
		$events->listen('user.login', 'BestBant\Handlers\UserEventHandler@onLogin');
		$events->listen('user.cancel', 'BestBant\Handlers\UserEventHandler@onCancel');
	}

}
<?php

namespace BestBant\LoggedInUser;

use Session, Auth, User;

class LoggedInUser {

	public function set($key)
	{
		$profile = User::find(Auth::id())->profile()->first(['full_name', 'picture']);

		Session::put('profile.full_name', $profile->full_name);
		Session::put('profile.picture', $profile->picture);

		return $profile->$key;
	}


	public function fullName()
	{
		return $this->get('full_name');
	}


	public function picture()
	{
		return $this->get('picture');
	}


	public function email()
	{
		return Auth::user()->email;
	}


	public function username()
	{
		return Auth::user()->username;
	}


	public function isActive()
	{
		if (Auth::user()->is_active == 1)
			return true;

		return false;
	}


	private function get($key)
	{
		if (Session::has("profile.$key"))
			return Session::get("profile.$key");

		return $this->set($key);
	}


	public function remove()
	{
		Session::remove('profile');
	}

} 
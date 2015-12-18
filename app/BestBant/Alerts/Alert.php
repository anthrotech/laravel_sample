<?php

namespace BestBant\Alerts;

use Redirect, Session, URL;

class Alert {

	public function formError($validator)
	{
		return $this->flash('Please correct the information below.', 'error')->withErrors($validator)->withInput();
	}


	public function has($alert)
	{
		if (Session::has('flash_'.$alert))
			return true;

		return false;
	}


	public function get($alert)
	{
		return Session::get('flash_'.$alert);
	}


	public function loginError()
	{
		return $this->flash('Wrong Username/Email and password combination.', 'login_error');
	}


	public function guestUsers()
	{
		return $this->flash('Please login to submit responses and vote for others.', 'warning');
	}


	public function activate($email)
	{
		$flash = 'Confirm your email address to submit responses and vote for others. A confirmation message was sent to <strong>'. $email .'</strong>.<br>';
		$flash .= '<a href="' . URL::to('resend-confirmation') . '">Resend Confirmation</a>';
		$flash .= '&nbsp; | &nbsp;';
		$flash .= '<a href="' . URL::to('') . '">Update Email Address</a>';

		return $this->flash($flash);
	}


	public function flash($message, $type = 'default')
	{
		return $this->redirect()->with('flash_'.$type, $message);
	}


	public function redirect()
	{
		$back = Redirect::getUrlGenerator()->getRequest()->headers->get('referer');

		if (!empty($back))
			return Redirect::back();

		return Redirect::intended('/');
	}

} 
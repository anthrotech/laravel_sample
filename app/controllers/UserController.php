<?php

class UserController extends BaseController {


    public function __construct()
    {
	    $this->beforeFilter('auth', ['only' => ['logout', 'resendActivation']]);
	    $this->beforeFilter('guest', ['only' => []]);
      	$this->beforeFilter('csrf', ['on' => ['post', 'put', 'patch', 'delete']]);
	}



	public function register()
	{
		$data = Input::all();
		$rules = [
			'first_name' => ['required', 'min:3', 'max:35'],
		    'last_name' => ['required', 'min:3', 'max:35'],
		    'username' => ['required', 'alpha_num', 'min:3', 'max:35', 'unique:users'],
		    'email' => ['required', 'email', 'max:128', 'unique:users'],
		    'picture' => ['sometimes', 'mimes:jpeg,gif,png', 'max:2048'],
		    'password' => ['required', 'min:6', 'confirmed']
		];

		$validator = Validator::make($data, $rules);

		if ($validator->fails())
			return Alert::formError($validator);

		$user = new User;
		$user_id = $user->store($data);

		$profile = new Profile;
		$profile->store($data, $user_id, Input::hasFile('picture'));

		$this->sendActivation($user_id, $data['email']);

		Auth::login($user);

		return Alert::activate($data['email']);
	}



	public function login()
	{
		$email = Input::get('email');
		$password = Input::get('password');
		$remember = Input::has('remember') ? true : false;

		return $this->attemptLogin($email, $password, $remember);
	}



	public function logout()
	{
		Auth::logout();
		LoggedInUser::remove();
		Session::flush();
		return Redirect::route('home');
	}



	private function attemptLogin($email, $password, $remember = false)
	{
		if (Auth::attempt(['email' => $email, 'password' => $password], $remember))
			return $this->isActivated($email);

		if (Auth::attempt(['username' => $email, 'password' => $password], $remember))
			return $this->isActivated(LoggedInUser::email());

		return Alert::loginError();
	}



	private function isActivated($email)
	{
		if (LoggedInUser::isActive())
			// Check for Admin User
			$check_admin = User::checkAdminRole(Auth::id());
			if (!empty($check_admin)) {
				Session::put('role', 'admin');
			}
			return Redirect::back();			

		return Alert::activate($email);
	}



	public function resendActivation()
	{
		$user_id = Auth::id();
		$email = LoggedInUser::email();
		$this->sendActivation($user_id, $email);

		return Alert::activate($email);
	}



	private function sendActivation($user_id, $email)
	{
		$token = Tools::hash($email);
		$url = Tools::generateUrl(['activate_account', $token]);

		$user = User::findOrFail($user_id);
		$user->activate_token = $token;
		$user->save();

		Mailing::activate($email, $url);
	}



	public function activateAccount($token)
	{
		$user = User::whereActivateToken($token)->firstOrFail();

		$user->is_active = (int)true;
		$user->activate_token = null;

		$user->save();

		Auth::loginUsingId($user->id);

		return Alert::flash(Lang::get('auth.activated'), 'success');
	}



	public function passwordRequest()
	{
		$email = ['email' => Input::get('email')];

		$response = Password::remind($email, function($message) {
			$message->subject('Password reset request');
		});

		switch ($response) {
			case Password::INVALID_USER:
				return Alert::flash(Lang::get($response), 'error')->withInput();

			case Password::REMINDER_SENT:
				return View::make('user.password.sent')->with('email', Input::get('email'));
		}
	}



	public function passwordReset($token)
	{
		return View::make('user.password.reset')->with('token', $token);
	}



	public function passwordUpdate()
	{
		$data = Input::only('email', 'password', 'password_confirmation', 'token');

		$response = Password::reset($data, function($user, $password) {
			$user->password = $password;
			$user->save();
		});

		switch ($response) {
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Alert::flash(Lang::get($response), 'error');

			case Password::PASSWORD_RESET:
				return Alert::flash(Lang::get('reminders.reset'),'success');
		}
	}



	public function facebookLogin()
	{
		$code = Input::get('code');

		$fb = Artdarek\OAuth\Facade\OAuth::consumer('Facebook');

		if (!empty($code)) {

			$token = $fb->requestAccessToken($code);
			$result = json_decode($fb->request('/me'), true);

			return User::storeSocialData($result, $token, 'fb');

		} else {
			$url = $fb->getAuthorizationUri();

			return Redirect::to((string)$url);
		}
	}



	public function twitterLogin()
	{
		$token = Input::get('oauth_token');
		$verify = Input::get('oauth_verifier');

		$tw = Artdarek\OAuth\Facade\OAuth::consumer('Twitter');

		if (!empty($token) && !empty($verify)) {

			$token = $tw->requestAccessToken($token, $verify);
			$result = json_decode($tw->request('account/verify_credentials.json'), true);

			return User::storeSocialData($result, $token, 'tw');

		} else {
			$reqToken = $tw->requestRequestToken();
			$url = $tw->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));

			return Redirect::to((string)$url);
		}
	}
}
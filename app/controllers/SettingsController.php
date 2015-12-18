<?php

class SettingsController extends BaseController {

    public function __construct() {
//      	$this->beforeFilter('auth', ['only' => ['index']]);
      	$this->beforeFilter('csrf', ['on' => ['post', 'put', 'patch', 'delete']]);
	}



	public function index()
	{
		$user = User::whereUsername(LoggedInUser::username())->firstOrFail();
		$profile = $user->profile()->first();
		
		$title = "My Settings";
		
		$email_notifications = Profile::getEmailNotifications();
		$email_user_settings = Profile::getMyEmailNotifications(Auth::id());		

		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);

		$posts = $user->posts()->get();

		return View::make('profile.dashboard.settings')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'profile'          => $profile,
			'user'             => $user,
			'email_notifications' => $email_notifications,
			'email_user_settings' => $email_user_settings,		
			'posts'            => $posts,
			'title'			   => $title
		]);
	}
	
	public function sendNotifications() {
		$all_email_notifications = Profile::getAllUserEmailNotifications();
		
		foreach ($all_email_notifications as $data) {
				Mailing::notifications($data);
		}
		echo 'Script Completed';
		
	}
	
	public function saveSettings() 
	{
		$data = Input::all();
		
		$profile = new Profile;
		
		$profile->deleteMyEmailNotifications(Auth::id());
		$profile->saveMyEmailNotifications(Auth::id(),$data);
		
		return Alert::flash(Lang::get('auth.settings-updated'), 'success');
	}
}
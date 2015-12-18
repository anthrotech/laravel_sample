<?php

class ProfileController extends BaseController {

    public function __construct() {
//      	$this->beforeFilter('auth', ['only' => ['index']]);
      	$this->beforeFilter('csrf', ['on' => ['post', 'put', 'patch', 'delete']]);
	}


	public function index($username)
	{
		$user = User::whereUsername($username)->firstOrFail();
		$profile = $user->profile()->first();

		if (Auth::check()) {
			if (LoggedInUser::username() == $username) {
				return $this->showMyProfile($user, $profile);
			}
			else {
				return $this->showOthersProfile($user, $profile);
			}
		}

		return $this->showGuestProfile($user, $profile);
	}


	private function showMyProfile($user, $profile)
	{
		
		$title = "My Profile";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);

		return View::make('profile.dashboard.profile')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
		    'profile'          => $profile,
		    'user'             => $user,
			'title'			   => $title
		]);
	}
	
	private function showOthersProfile($user,$profile)
	{
		$title = $user->username." Profile";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);
		$bants = Post::getUserPosts($user->username);
		$num_posts = count($bants);		
		

		return View::make('profile.othersprofile')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
		    'profile'          => $profile,
		    'user'             => $user,		
			'title'			   => $title,
			'num_posts'		   => $num_posts,
			'bants'			   => $bants		
		]);
	}	

	private function showGuestProfile($user, $profile)
	{
		
		$title = "Guest Profile";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);
		$bants = Post::getUserPosts($user->username);
		$num_posts = count($bants);

		return View::make('profile.index')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'title'			   => $title,
			'user'			   => $user,
			'profile'		   => $profile,
			'num_posts'		   => $num_posts,
			'bants'			   => $bants
		]);
	}


	public function saveProfile()
	{
		$data = Input::all();
		$rules = [
			'email'        => ['required', 'email', 'max:128', 'unique:users,email,'.Auth::id()],
		    'username'     => ['required', 'min:5', 'max:15', 'alpha_num', 'unique:users,username,'.Auth::id()],
		    'password'     => ['sometimes', 'min:6', 'confirmed'],
		    'old_password' => ['sometimes', 'required_with:password'],
		    'name'         => [],
		    'picture'      => ['sometimes', 'mimes:jpeg,gif,png', 'max:2048'],
		    'address'      => ['sometimes', 'min:5', 'max:100'],
		    'city'         => ['sometimes', 'min:3', 'max:64'],
		    'state'        => ['sometimes', 'min:2', 'max:64'],
		    'zip_code'     => ['sometimes', 'min:5', 'max:8'],
		    'country'      => ['sometimes', 'min:2', 'max:32'],
		    'age'          => ['sometimes', 'digits:2'],
		    'gender'       => ['sometimes', 'in:0,1,2'],
		    'language'     => ['sometimes', 'min:2', 'max:6'],
		    'relationship' => ['sometimes', 'in:0,1,2,3,4,5,6,7,8,9,10,11']
		];

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return Alert::formError($validator);
		}
		else {
			$profile = new Profile;
			$profile->updateProfile($data, Auth::id(),Input::hasFile('picture'));		
			$user = new User;
			$username = $user->getUserName(Auth::id());	
			return Alert::flash(Lang::get('auth.updated'), 'success');
		}
	}
	
	public static function adminListPages() {
		
		$title = "Pages";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);
		
		$pages = Page::getAllPages();
		
		return View::make('admin.pages')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'title'			   => $title,
			'pages'			   => $pages
		]);
	}	
	
	public static function adminPage($id) {
		
		$title = "Page";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);
		
		$get_page = Page::getPage($id);
		
		return View::make('admin.pages-show')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'pages' 		   => $get_page,
			'title'			   => $title
		]);				
		
	}
	
	public static function adminUpdatePage($id) {
		
			$data = Input::all();
			$rules = [
			'title'      => ['required', 'min:5', 'max:500'],
		    'slug'     	    => ['required', 'min:5', 'max:500'],
			'content'   => ['required', 'min:2']	
			];

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return Alert::formError($validator);
		}
		else {		
			$page = new Page;
			$update = Page::UpdatePage($id,$data);
			return Alert::flash(Lang::get('admin.page-updated'), 'success');
		}				
		
	}		
	
	public static function adminDeletePage($id) {
  		$delete = Page::deletePage($id);
  		
  		Session::flash('success', Lang::get('admin.page-deleted'));
  		
  		return Redirect::to('admin/pages/');		
		
	}			
	
	public static function adminListPosts() {
		
		$title = "Posts";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);
		
		$posts = Post::getAllPosts();
		
		return View::make('admin.posts')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'posts'			   => $posts,
			'title'			   => $title
		]);
		
	}	
	
	public static function adminActivatePost($id) {
  		$activate = Post::managePostStatus($id,1);
  		
  		Session::flash('success', Lang::get('admin.posts-updated'));
  		
  		return Redirect::to('admin/posts/');
  		
	}		
	
	public static function adminDeactivatePost($id) {
  		$deactivate = Post::managePostStatus($id,0);
  		
  		Session::flash('success', Lang::get('admin.posts-updated'));
  		
  		return Redirect::to('admin/posts/');
  		
	}	

	public static function adminListQuestions() {
		
		$title = "Questions";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);
		
		$get_questions = Question::getAllQuestions();
		
		return View::make('admin.questions')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'questions'		   => $get_questions,
			'title'			   => $title
		]);
		
	}	
	
	public static function adminQuestion($id) {
		
		$title = "Question";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);
		
		$get_question = Question::getQuestion($id);
		
		return View::make('admin.questions-show')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'questions'		   => $get_question,
			'title'			   => $title
		]);				
		
	}
	
	public static function adminUpdateQuestion($id) {
		
		$data = Input::all();
		$rules = [
			'question'      => ['required', 'min:5', 'max:500'],
		    'slug'     	    => ['required', 'min:5', 'max:500'],
			'left_option'   => ['required', 'min:2', 'max:500'],
			'right_option'  => ['required', 'min:2', 'max:500'],
			'start_at'   	=> ['required', 'min:2', 'date_format:Y-m-d'],
			'end_at'  		=> ['required', 'min:2', 'date_format:Y-m-d'],		
		];

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return Alert::formError($validator);
		}
		else {		
			$question = new Question;
			$update = Question::UpdateQuestion($id,$data);
			return Alert::flash(Lang::get('admin.question-updated'), 'success');
		}				
		
	}	

	public static function adminCreateQuestion() {
		
		$title = "Question";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);
		
		return View::make('admin.questions-new')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'title'			   => $title
		]);					
		
	}
	
	public static function adminSaveQuestion() {

		$data = Input::all();
		$rules = [
			'question'      => ['required', 'min:5', 'max:500'],
		    'slug'     	    => ['required', 'min:5', 'max:500'],
			'left_option'   => ['required', 'min:2', 'max:500'],
			'right_option'  => ['required', 'min:2', 'max:500'],
			'start_at'   	=> ['required', 'min:2', 'date_format:Y-m-d'],
			'end_at'  		=> ['required', 'min:2', 'date_format:Y-m-d'],		
		];

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return Alert::formError($validator);
		}
		else {		
			$question = new Question;
			$create = Question::CreateQuestion($data);
  		
			Session::flash('success', Lang::get('admin.question-added'));
  		
  			return Redirect::to('admin/questions/');
		}	
		
	}			
	
	public static function adminActivateQuestion($id) {
  		$activate = Question::manageQuestionStatus($id,1);
  		
  		Session::flash('success', Lang::get('admin.questions-updated'));
  		
  		return Redirect::to('admin/questions/');
  		
	}		
	
	public static function adminDeactivateQuestion($id) {
  		$deactivate = Question::manageQuestionStatus($id,0);
  		
  		Session::flash('success', Lang::get('admin.questions-updated'));
  		
  		return Redirect::to('admin/questions/');
  		
	}	
	
	public static function adminListUsers() {
		
		$title = "Users";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);
		
		$get_users = User::getAllUsers();
		
		return View::make('admin.users')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'users'			   => $get_users,
			'title'			   => $title
		]);
		
	}	
	
	public static function adminUser($id) {
		
		$title = "User";
		
		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);
		
		$get_user = User::getUser($id);
		
		return View::make('admin.users-show')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'user'			   => $get_user,
			'title'			   => $title
		]);		
		
	}
	
	public static function adminUpdateUser($id) {
		
			$data = Input::all();
			$rules = [
			'email'        => ['required', 'email', 'max:128', 'unique:users,email,'.Auth::id()],
		    'username'     => ['required', 'min:5', 'max:15', 'alpha_num', 'unique:users,username,'.Auth::id()]
		];

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return Alert::formError($validator);
		}
		else {		
			$user = new User;
			$update = User::UpdateUser($id,$data);
			return Alert::flash(Lang::get('admin.user-updated'), 'success');
		}		
		
	}			
	
	public static function adminActivateUser($id) {
  		$activate = User::manageUserStatus($id,1);
  		
  		Session::flash('success', Lang::get('admin.users-updated'));
  		
  		return Redirect::to('admin/users/');
  		
	}		
	
	public static function adminDeactivateUser($id) {
  		$deactivate = User::manageUserStatus($id,0);
  		
  		Session::flash('success', Lang::get('admin.users-updated'));
  		
  		return Redirect::to('admin/users/');
  		
	}				
	
}
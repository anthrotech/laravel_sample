<?php

class ArchiveController extends BaseController {

    public function __construct() {
      	$this->beforeFilter('auth', ['only' => ['edit', 'update']]);
      	$this->beforeFilter('csrf', ['on' => ['post', 'put', 'patch', 'delete']]);
	}


	public function index()
	{
		
		$title = "Archives";
		$currentQuestion = Question::getCurrentQuestion();
		
		
		if (!empty($currentQuestion)) {
			$remaining_time = Question::getRemainingTime($currentQuestion);
			$leading = Post::getLeadingBant($currentQuestion);
			$show_questions = Question::getQuestionId($currentQuestion);

			return View::make('archives.index')->with([
				'question'         => $currentQuestion,
				'remaining_time'   => $remaining_time,
				'leading'		   => $leading,
				'show_questions'   => $show_questions,
				'title'			   => $title
			]);
		}
		else {
			return Redirect::home();
		}
	}


	public function showArchive($username)
	{
		$user = User::whereUsername($username)->firstOrFail();
		$profile = $user->profile()->first();
		
		$title = "My Archives";

		$currentQuestion = Question::getCurrentQuestion();
		$remaining_time = Question::getRemainingTime($currentQuestion);
		$leading = Post::getLeadingBant($currentQuestion);

		$posts = $user->posts()->get();

		return View::make('profile.dashboard.archive')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'leading'          => $leading,
			'profile'          => $profile,
			'user'             => $user,
			'posts'            => $posts,
			'title'			   => $title
		]);
	}

}
<?php

class PostController extends BaseController {


    public function __construct()
    {
	    $this->beforeFilter('auth', ['only' => ['postOptions', 'thumbsUp']]);
	    $this->beforeFilter('active', ['only' => ['postOptions', 'thumbsUp']]);
      	$this->beforeFilter('csrf', ['on' => ['post', 'put', 'patch', 'delete']]);
	}



	public function index()
	{
		$title = "Question";
		
		$currentQuestion = Question::getCurrentQuestion();
		
		if (!empty($currentQuestion)) {
		$points_pct = Question::getTotalPointsPct($currentQuestion);
		$remaining_time = Question::getRemainingTime($currentQuestion);

		$posts = Post::getTopPosts($currentQuestion);

		$leading = Post::getLeadingBant($currentQuestion);

		return View::make('posts.index')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'points_pct'       => $points_pct,
			'posts'            => $posts,
			'leading'          => $leading,
			'title'			   => $title
		]);
		}
		else {
			return Redirect::home();
		}
	}



	public function show($id, $slug)
	{
		$post = Post::where('id', $id)->where('slug', $slug)->with('user.profile')->firstOrFail();

		Read::setReadPoints($post);
		
		$title = "Question";

		$currentQuestion = Question::getCurrentQuestion();
		$points_pct = Question::getTotalPointsPct($currentQuestion);
		$remaining_time = Question::getRemainingTime($currentQuestion);

		$posts = Post::getRandPosts($currentQuestion);

		return View::make('posts.show')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'points_pct'       => $points_pct,
			'posts'            => $posts,
			'selected_post'    => $post,
			'title'			   => $title
		]);
	}



	public function postOptions()
	{
		$title = "Post";
		
		$currentQuestion = Question::getCurrentQuestion();
		$points_pct = Question::getTotalPointsPct($currentQuestion);
		$remaining_time = Question::getRemainingTime($currentQuestion);

		$posts = Post::getRandPosts($currentQuestion);

		$leading_username = "BrewerBoy";
		$leading_votes = 30;

		return View::make('posts.options')->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'points_pct'       => $points_pct,
			'posts'            => $posts,
			'leading_username' => $leading_username,
			'leading_votes'    => $leading_votes,
			'title'			   => $title
		]);
	}



	public function thumbsUp($id, $slug)
	{
		$post = Post::where('id', $id)->where('slug', $slug)->with('user.profile')->firstOrFail();

		if(!Vote::setVotePoints($post))
			return Alert::flash(Lang::get('post.vote'), 'warning');

		return Redirect::action('post', [$id, $slug]);
	}
	
	public function reportPost($id) 
	{
		
		$check_tracking = Post::checkPostTracking($id);
		
		$post = Post::where('id', $id)->firstOrFail();
	 	$email = 'contact@bestbant.com';
	 	$slug = $post['slug'];	
		
		if ($check_tracking) {
			Session::flash('failure', Lang::get('post.report-sent-already'));
		} 
		else {	
	 		Mailing::reportpost($email, $post);	
		
			if (Auth::check()) {
				$userid = Auth::id();
				Post::trackReportPost($post,$userid);
			}
			else {
				Post::trackReportPost($post);
			}
		
			Session::flash('success', Lang::get('post.report-sent'));
		} 
		
		return Redirect::to('post/'.$id.'/'.$slug);
		
	}

}
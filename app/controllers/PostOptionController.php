<?php

class PostOptionController extends BaseController {


    public function __construct() {
	    $this->beforeFilter('auth', ['except' => []]);
	    $this->beforeFilter('active', ['except' => []]);
      	$this->beforeFilter('csrf', ['on' => ['post', 'put', 'patch', 'delete']]);
	}


	public function text() { return $this->displayForm('text'); }

	public function video() { return $this->displayForm('video'); }

	public function photo() { return $this->displayForm('photo'); }

	public function audio() { return $this->displayForm('audio'); }

	public function link() { return $this->displayForm('link'); }

	public function vine() { return $this->displayForm('vine'); }


	public function storeText()
	{
		return $this->processForm('text', Input::all(), ['content' => ['required', 'min:10', 'max:2000']]);
	}


	public function storeVideo()
	{
		return $this->processForm('video', Input::all(), ['link' => ['required', "min:10", "max:500"]]);
	}


	public function storePhoto()
	{
		return $this->processForm('photo', Input::all(), ['post_file' => ['required']]);
	}


	public function storeAudio()
	{
		return $this->processForm('audio', Input::all(), ['post_file' => ['required']]);
	}
	
	public function storeVine()
	{
		return $this->processForm('vine', Input::all(), ['link' => ['required', "min:10", "max:500"]]);
	}	


	public function storeLink()
	{
		return $this->processForm('link', Input::all(), ['link' => ['required', "min:10", "max:500"]]);
	}
	

	private function displayForm($type)
	{
			
		$title = "Post Comment";

		$currentQuestion = Question::getCurrentQuestion();
		$points_pct = Question::getTotalPointsPct($currentQuestion);
		$remaining_time = Question::getRemainingTime($currentQuestion);

		$posts = Post::getRandPosts($currentQuestion);
		
		if(Post::hasPost($currentQuestion))
			return Alert::flash(Lang::get('post.exist'), 'warning');		

		$options = [
			$currentQuestion['left_option'] => ucfirst($currentQuestion['left_option']),
			$currentQuestion['right_option'] => ucfirst($currentQuestion['right_option'])
		];

		return View::make("posts.options.$type")->with([
			'question'         => $currentQuestion,
			'remaining_time'   => $remaining_time,
			'points_pct'       => $points_pct,
			'posts'            => $posts,
			'options'          => $options,
			'title'			   => $title
		]);
	}


	private function processForm($type, $data, $extra_rules)
	{
		$currentQuestion = Question::getCurrentQuestion();
		$rules = [
			'question'  => ['required', "in:{$currentQuestion['id']}"],
			'option'    => ['required', "in:{$currentQuestion['left_option']},{$currentQuestion['right_option']}"],
			'post_type' => ['required', "in:$type"],
			'title'     => ['required', "min:10", "max:200"]
		];

		foreach($extra_rules as $field => $rule)
			$rules[$field] = $rule;

		$validator = Validator::make($data, $rules);
		if ($validator->fails())
			return Alert::formError($validator);

		$post = new Post;
		$posted = $post->store($data, $type);

		return Redirect::route('post', [$posted['id'], $posted['slug']])->with('flash_success', Lang::get('post.saved'));
	}

}
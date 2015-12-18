<?php

class Post extends Eloquent {


	public function question()
	{
		return $this->belongsTo('Question');
	}


	public function user()
	{
		return $this->belongsTo('User');
	}


	public function read()
	{
		return $this->hasMany('Read');
	}


	public function votes()
	{
		return $this->hasMany('Vote');
	}
	
	public function savePostFile($file, $type, $user_id)
	{
		$file_extension = $file->getClientOriginalExtension();
		$file_name = $user_id .'.'. $file_extension;
		$srcPath = storage_path() . '/upload';
		$srcFullPath = $srcPath . '/' . $file_name;
		$distPath = Config::get('bestbant.file_path') . '/';
		$distFullPath = $distPath . $file_name;		
		
		if ($type == 'photo') {
			
			$file->move($srcPath, $file_name);
			
			$picture = Image::make($srcFullPath);
	
			$picture->resize(500, null, function($constraint) { $constraint->aspectRatio(); })
					->crop(500,500)
					->save($distFullPath);			
		}
		else {
			$file->move($distPath, $file_name);
		}
		
		if(is_readable($srcFullPath))
				unlink($srcFullPath);				
				
		return $file_name;
	}	


	public function store($data, $type = null)
	{
		$this->user_id = Auth::id();
		$this->question_id = $data['question'];
		$this->slug = Tools::slug($data['title']);
		$this->title = $data['title'];
		$this->type = $data['post_type'];
		$this->selected_option = $data['option'];

		switch ($type) {
			case 'text':
				$this->content = Purifier::clean($data['content']);
				$description = $data['content'];
				break;
			case 'link':
			case 'video':
			case 'vine':
				$this->content = Purifier::clean($data['link'], 'noHtml');
				$description = $data['description'];
				break;
			case 'audio':
			case 'photo':
				$file            = Input::file('post_file');
				$this->post_file_ext = $file->getClientOriginalExtension();
				$this->post_file = $this->savePostFile($file, $type, Auth::id());			
				$description = $data['content'];
				break;
		}

		$this->description = str_limit(Purifier::clean($description, 'noHtml'), 255, '');

		$this->save();

		return ['id' => $this->id, 'slug' => $this->slug];
	}


	public static function getTopPosts($question, $nbr_posts = 5)
	{
		$l_posts = $question->posts()
							->whereSelectedOption($question->left_option)
							->orderBy('points', 'desc')
							->take($nbr_posts)
							->with('user.profile')
							->where('posts.is_active','=','1')
							->get();

		$r_posts = $question->posts()
							->whereSelectedOption($question->right_option)
							->orderBy('points', 'desc')
							->take($nbr_posts)
							->with('user.profile')
							->where('posts.is_active','=','1')
							->get();

		$posts = [
			'left' => $l_posts,
			'right' => $r_posts
		];

		return $posts;
	}


	public static function getRandPosts($question, $nbr_posts = 3)
	{
		$l_posts = $question->posts()
			->whereSelectedOption($question->left_option)
			->orderByRaw('RAND()')
			->take($nbr_posts)
			->with('user.profile')
			->where('posts.is_active','=','1')
			->get();

		$r_posts = $question->posts()
			->whereSelectedOption($question->right_option)
			->orderByRaw('RAND()')
			->take($nbr_posts)
			->with('user.profile')
			->where('posts.is_active','=','1')
			->get();

		$posts = [
			'left' => $l_posts,
			'right' => $r_posts
		];

		return $posts;
	}
	
	public static function getUserPosts($username)
	{
		$user = DB::table('users')
                    ->where('username', '=', $username)->get();	
                    
        $posts = DB::table('posts')
        			 ->where('user_id', '=', $user[0]->id)->get();
        			 
    	return $posts;
		
	}	


	public static function getLeadingBant($question)
	{
		if ($question) {
			$leading_bant = $question->posts()->whereRaw('points = (select max(points) from posts) AND posts.is_active = 1')->with('user')->first();
		}
		else {
			$leading_bant = array();
		}

		return $leading_bant;
	}
	
	public static function getTopBants($question_id)
	{
		
		$top_bants = DB::table('posts')
            ->join('questions', 'posts.question_id', '=', 'questions.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select(DB::raw('questions.question, posts.id, posts.title, posts.content, posts.description, posts.type, posts.selected_option, posts.user_id, posts.created_at, max(posts.points) as points, users.username'))
            ->where('question_id','=',$question_id)
            ->where('posts.is_active','=','1')
            ->get();  
              
		return $top_bants;  
	}	
	

	public static function hasPost($question)
	{
		
		$question_id = DB::table('questions')
					 ->where('question','=',$question->question)->get();
					 
	 	$user_id = Auth::id();
		
		$has_post = DB::table('posts')->whereRaw('user_id = '.$user_id.' AND question_id = '.$question_id[0]->id)->get();
		
		return $has_post;
	}
	
	public static function checkPostTracking($id) 
	{
		$check_post_tracking = DB::table('report_tracking')->where('postid','=',$id)->get();

		return $check_post_tracking;
	}	
	
	public static function trackReportPost($post,$userid = null) 
	{
		if (!empty($userid)) {
			DB::table('report_tracking')->insert(array('reporterid' => $userid, 'postid' => $post['id']));
		}
		else {
			DB::table('report_tracking')->insert(array('postid' => $post['id']));
		}
		
	}
	
	public static function getAllPosts() {
		$get_posts = DB::table('posts')
			->join('questions', 'posts.question_id', '=', 'questions.id')
			->join('users', 'posts.user_id', '=', 'users.id')
			->select(DB::raw('questions.question, posts.id, posts.user_id, posts.title, posts.content, posts.description, posts.is_active, posts.type, posts.selected_option, posts.user_id, posts.created_at, points, users.username'))
			->orderBy('posts.question_id', 'desc')
			->paginate(10);
		
		return $get_posts;		
	}
	
	public static function managePostStatus($id,$status) {
		$update_post = DB::table('posts')	
			            ->where('id', $id)
            ->update(array('is_active' => $status));
            
        return $update_post;
	}	

}
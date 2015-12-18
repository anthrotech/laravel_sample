<?php

class Vote extends Eloquent {

	protected $guarded = [];


	public function post()
	{
		return $this->belongsTo('Post');
	}


	public function user()
	{
		return $this->belongsTo('User');
	}


	public static function setVotePoints($post)
	{
		$user_id = Auth::id();
		$exists = self::wherePostId($post->id)->whereUserId($user_id)->exists();

		if(!$exists) {

			$post->points += 2;
			$post->save();

			self::create([
				'user_id' => $user_id,
				'post_id' => $post->id
			]);

			return true;
		}

		return false;
	}
	
	public static function getPostVotes($id) 
	{
		$votes = DB::table('votes')
        			 ->where('post_id', '=', $id)->get();
        			 
    	return $votes;
		
	}

}
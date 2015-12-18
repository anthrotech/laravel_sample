<?php

class Read extends Eloquent {

	protected $table = 'read';
	protected $guarded = [];
	public $timestamps = false;


	public function post()
	{
		return $this->belongsTo('Post');
	}


	public static function setReadPoints($post)
	{
		$ip_address = Request::getClientIp();
		$exists = $post->read()->whereIpAddress($ip_address)->exists();

		if(!$exists) {

			$post->points += 1;
			$post->save();

			self::create([
				'post_id' => $post->id,
				'ip_address' => $ip_address
			]);
		}
	}

}
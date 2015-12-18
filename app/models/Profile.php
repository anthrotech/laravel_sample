<?php

class Profile extends Eloquent {


	protected $appends = ['full_name'];


	public function user()
	{
		return $this->belongsTo('User');
	}


	public static function setProfileIdAttribute($value)
	{
		$this->attributes['profile_id'] =  Tools::hash($value);
	}
	
	public static function getEmailNotifications() 
	{
		$settings = DB::table('email_notifications')->where('status','=','1')->orderBy('list_order','asc')->get();

		return $settings;
	}
	
	public static function emailNotificationsConfig($emailnotificationid) 
	{
		$settings = DB::table('email_notifications_config')
		->join('email_notifications_frequency', 'email_notifications_config.emailnotificationfreqid', '=', 'email_notifications_frequency.id')
		->where('emailnotificationid','=',$emailnotificationid)
		->select('email_notifications_config.id', 'email_notifications_frequency.description')
		->get();
		
		return $settings;
	}
		
	public static function getMyEmailNotifications($userid) 
	{
		$email_user_settings = DB::table('email_user_settings')->where('user_id','=',$userid)->select('email_user_settings.email_config_id')->get();
		
		$settings = array(); 
		
		foreach ($email_user_settings as $setting) { 
				$settings[] .= $setting->email_config_id; 
		}		
				
		return $settings;
		
	}
	
	public static function getAllUserEmailNotifications() 
	{
		$today = date('D');
		
		$user_settings = DB::table('email_user_settings')
		->join('email_notifications_config','email_user_settings.email_config_id','=','email_notifications_config.id')
		->select('email_user_settings.id','email_user_settings.user_id','email_notifications_config.emailnotificationid','email_notifications_config.emailnotificationfreqid')
		->get();
		
		$elements = array();
		
		foreach($user_settings as $setting) {
			if (($setting->emailnotificationfreqid == '1') OR ($setting->emailnotificationfreqid == '2') && ($today == 'Mon')) {
				$elements[] .= '{"email_config_id":"'.$setting->id.'","email_notify_id":"'.$setting->emailnotificationid.'", "email_freq_id":"'.$setting->emailnotificationfreqid.'", "user_id":"'.$setting->user_id.'"}';
			}
		}		
		$data = '{"data":['.implode(',', $elements).']}';
		
		$json=json_decode($data,true);
		
		foreach($json['data'] as $item) { //foreach element in $arr
    		$email_notify_id = $item['email_notify_id']; 
    		$email_freq_id = $item['email_freq_id'];
    		$email_user_id = $item['user_id'];
    		$email_config_id = $item['email_config_id'];
	
			$notifications = DB::table('email_notifications')
 				->where('id','=',$email_notify_id)
 				->get();	
 		
		 	foreach ($notifications as $notification) {
 					switch($notification->label) {
 						case 'individual_points':
 							// Query for Individual Points Based on UserId
 								$results = DB::table('posts')
 								->join('questions','posts.question_id','=','questions.id')
 								->join('users','users.id','=','posts.user_id')
 								->select(DB::raw('"1" as notify_id,"'.$notification->description.'" as description,questions.question,posts.question_id,posts.points,posts.selected_option,users.id,users.email,users.username'))
 								->whereRaw('posts.user_id = '.$email_user_id.' AND NOW() >= questions.start_at AND NOW() <= questions.end_at')
 								->get();							
 							break;
 						case 'lead_points':
 							// Query for Lead Points for Question
 								$lead_results = DB::table('posts')
 								->join('questions','posts.question_id','=','questions.id')
 								->join('users','users.id','=','posts.user_id')
 								->select(DB::raw('"2" as notify_id,"'.$notification->description.'" as description,questions.question,posts.question_id,posts.points,posts.selected_option,users.id,users.email,users.username'))
 								->whereRaw('posts.user_id = '.$email_user_id.' AND NOW() >= questions.start_at AND NOW() <= questions.end_at')
 								->get(); 	 								
 					 			foreach ($lead_results as $result) {
 									// Get All other Posts with the Same Value
 									$results = DB::table('posts')
 									->join('questions','posts.question_id','=','questions.id')
 									->join('users','users.id','=','posts.user_id')
 									->select(DB::raw('"2" as notify_id,"'.$notification->description.'" as description,questions.question,posts.question_id,max(posts.points) as points,posts.selected_option,users.id,"'.$result->email.'" as email,users.username'))
 									->whereRaw('NOW() >= questions.start_at AND NOW() <= questions.end_at')
 									->get();		
 								} 								 				
 							break; 							
 						case 'winner':
 							// Query for Winnter of Question
 								$last_week = strtotime("-1 week");
 								$winner_results = DB::table('posts')
 								->join('questions','posts.question_id','=','questions.id')
 								->join('users','users.id','=','posts.user_id')
 								->select(DB::raw('"3" as notify_id,"'.$notification->description.'" as description,questions.question,posts.question_id,posts.points,posts.selected_option,users.id,users.email,users.username'))
 								->whereRaw('posts.user_id = '.$email_user_id.' AND questions.start_at = '.$last_week)
 								->get(); 	
 								foreach ($winner_results as $result) { 			
 									$results = DB::table('posts')					
 									->join('questions','posts.question_id','=','questions.id')
 									->join('users','users.id','=','posts.user_id')
 									->select(DB::raw('"3" as notify_id,"'.$notification->description.'" as description,questions.question,posts.question_id,max(posts.points) as points,posts.selected_option,users.id,"'.$result->email.'" as email,users.username'))
 									->whereRaw('NOW() >= questions.start_at AND NOW() <= questions.end_at')
 									->get();
 								} 				
 							break;
 						case 'same_side':
 							// Query for Same Side Answers
 								$results = DB::table('posts')
 								->join('questions','posts.question_id','=','questions.id')
 								->join('users','users.id','=','posts.user_id')
 								->select(DB::raw('"4" as notify_id,"'.$notification->description.'" as description,questions.question,posts.question_id,posts.points,posts.selected_option,users.id,users.email,users.username'))
 								->whereRaw('posts.user_id = '.$email_user_id.' AND NOW() >= questions.start_at AND NOW() <= questions.end_at')
 								->groupBy('posts.selected_option')
 								->get();		
 							break;
 					}
				$send_results[] = $results;  					
 			}		
		}
		return $send_results;
	}
	
	public static function getEmailNotificationsSameAnswer($q_id,$selected_option,$user_id) {
		
		$selected_options = DB::table('posts')
		->join('users','users.id','=','posts.user_id')
		->select(DB::raw('users.username'))
		->whereRaw('posts.question_id = '.$q_id.' AND posts.selected_option =  "'.$selected_option.'" AND posts.user_id != '.$user_id)
		->get();
		
		return $selected_options;		
	}

	public function deleteMyEmailNotifications($user_id) 
	{
	 $delete = DB::table('email_user_settings')->where('user_id', '=', $user_id)->delete();
	
	 return $delete;
		 
	}
	
	public function saveMyEmailNotifications($user_id,$data) 
	{
		foreach ($data['emailnotificationfreqid'] as $freqid) {
			$save = DB::table('email_user_settings')->insert(array(array('user_id' => $user_id, 'email_config_id' => $freqid)));		
		}
		return $save;
	}


	public function saveUserPicture($hasPicture, $picture, $username)
	{
		if ($hasPicture)
		{
			$file_extension = $picture->getClientOriginalExtension();
			$file_name = $username .'.'. $file_extension;
			$srcPath = storage_path() . '/upload';
			$srcFullPath = $srcPath . '/' . $file_name;
			$distFullPath = Config::get('bestbant.picture_path') . '/' . $file_name;

			$picture->move($srcPath, $file_name);

			$avatar = Image::make($srcFullPath);

			$avatar->resize(90, null, function($constraint) { $constraint->aspectRatio(); })
					->crop(90, 90)
					->save($distFullPath);

			if(is_readable($srcFullPath))
				unlink($srcFullPath);

			return $file_name;
		}
		else {
			return 'default_avatar.jpg';
		}
	}


	public function store($data, $user_id, $hasPicture)
	{
		$this->user_id = $user_id;
		$this->full_name = ucwords($data['first_name'] . ' ' . $data['last_name']);
		$this->ip_address = Request::getClientIp();
		$this->picture = $this->saveUserPicture($hasPicture, $data['picture'], $data['username']);

		$this->save();
	}
	
	
	public function updateProfile($data, $user_id, $hasPicture)
	{
		
		$this->picture = $this->saveUserPicture($hasPicture, $data['picture'], $data['username']);
		
		$new_password = Hash::make($data['password']);
		
		DB::table('profiles')
            ->where('user_id', $user_id)
            ->update(array('full_name' => $data['name'],
            				'address' => $data['address'],
            				'city' => $data['city'],
            				'state' => $data['state'],
            				'country' => $data['country'],
            				'zip' => $data['zip_code'],
            				'age' => $data['age'],
            				'gender' => $data['gender'],
            				'language'=> $data['language'],
            				'facebook' => $data['facebook'],
            				'twitter' => $data['twitter'],
            				'url' => $data['url'],
            				'interests' => $data['interests'],
            				'relationship' => $data['relationship'],
            				'ip_address' => $_SERVER['REMOTE_ADDR'],
            				'picture' => $this->picture
           	));
           	
		DB::table('users')
            ->where('id', $user_id)
            ->update(array('username' => $data['username'],
            				'password' => $new_password
           	));           	
	}
} 
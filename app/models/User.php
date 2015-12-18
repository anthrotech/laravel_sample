<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	protected $hidden = array('password', 'remember_token');


	public function profile()
	{
		return $this->hasOne('Profile');
	}


	public function posts()
	{
		return $this->hasMany('Post');
	}


	public function votes()
	{
		return $this->hasMany('Vote');
	}


	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}


	public function store($data)
	{
		$this->email = $data['email'];
		$this->username = $data['username'];
		$this->password = $data['password'];
		$this->is_active = (int)false;

		$this->save();

		return $this->id;
	}


	public static function storeSocialData($results, $token, $sn)
	{
		if($sn == 'fb') {

			echo '<pre>';
			var_dump($results);
			die();

		} else {
			
			echo '<pre>';
			var_dump($results);
			die();

		}
	}
	
	public static function getUserProfile($id) {
		
		$profile = DB::table('profiles')
                    ->where('user_id', '=', $id)->get();			
		return $profile;
	}
	
	public static function getUserName($id) {
		$get_username = DB::table('users')
					->where('id','=',$id)->get();
					
		$username = $get_username[0]->username;
		
		return $username;
	}
	
	public static function checkAdminRole($id) {
		$get_role = DB::table('users_roles')
					->where('user_id','=',$id)
					->get();
		if ($get_role) {
			if ($get_role[0]->role_id == '1') {
				return true;
			}
		}
	}
	
	public static function getAllUsers() {
		$get_users = DB::table('users')->orderBy('username', 'asc')->paginate(10);
		
		return $get_users;
	}
	
	public static function manageUserStatus($id,$status) {
		$update_user = DB::table('users')	
			            ->where('id', $id)
            ->update(array('is_active' => $status));
            
        return $update_user;
	}
	
	public static function UpdateUser($id,$data) {
		$update_user = DB::table('users')	
			            ->where('id', $id)
            ->update(array('username' => $data['username'], 'email' => $data['email']));
            
        return $update_user;		
	}	
	
	public static function getUser($id) {
		$user = DB::table('users')
					->where('id','=',$id)->get();
		
		return $user;		
	}

}

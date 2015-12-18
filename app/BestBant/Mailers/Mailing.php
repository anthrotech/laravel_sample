<?php

namespace BestBant\Mailers;

use Mail, Config;

class Mailing {

	public function sendTo($email, $subject, $view, $data = [], $file = null) {

		$data = array_filter($data);
		$name = (array_key_exists('name', $data)) ? $data['name'] : Config::get('mail.from.name');

		Mail::send($view, $data, function($message) use($email, $name, $subject, $file) {
			$message->to($email, $name)->subject($subject);
			if(!empty($file))
				$message->attach($file);
		});
	}


	public function contact($data) {
		$email = $data['email'];
		$subject = 'BestBant.com : Contact Form';
		$view = 'emails.contact';
		$this->sendTo($email, $subject, $view, $data);
	}


	public function activate($email, $url) {
		$data = ['url' => $url];
		$subject = 'Confirm your BestBant account';
		$view = 'emails.auth.activate';
		$this->sendTo($email, $subject, $view, $data);
	}
	
	public function reportpost($email, $post) {
		$id = $post['id'];
		$title = $post['title'];
		$ipaddress = $_SERVER['REMOTE_ADDR'];
		$data = ['id' => $id, 'title' => $title, 'ipaddress' => $ipaddress];
		$subject = 'Report Post: '.$title;
		$view = 'emails.report-post';
		$this->sendTo($email, $subject, $view, $data);
	}
	
	public function notifications($data) {
		$email = $data[0]->email;
		$notify_id = $data[0]->notify_id;
		$description = $data[0]->description;
		$question = $data[0]->question;
		$question_id = $data[0]->question_id;
		$selected_option = $data[0]->selected_option;
		$user_id = $data[0]->id;
		$username = $data[0]->username;
		$points = $data[0]->points;
		$data = ['notify_id' => $notify_id, 'description' => $description, 'question' => $question, 'question_id' => $question_id, 'selected_option' => $selected_option, 'username' => $username, 'user_id' => $user_id, 'points' => $points];
		$subject = 'Best Bant: Notification';
		$view = 'emails.notifications';
		$this->sendTo($email, $subject, $view, $data);
	}	

//
//	public function attachFile($email, $subject, $file, $data = []) {
//		$view = 'emails.attachfile';
//		$this->sendTo($email, $subject, $view, $data, $file);
//	}

}
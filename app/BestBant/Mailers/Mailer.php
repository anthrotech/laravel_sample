<?php

namespace BestBant\Mailers;

Use Mail;

class Mailer {

	public function sendTo($email, $subject, $view, $data = [], $file = null) {

		$data = array_filter($data);
		$name = (!empty($data)) ? $data['name'] : 'Physician\'s Ally';

		Mail::send($view, $data, function($message) use($email, $name, $subject, $file) {
			$message->to($email, $name)->subject($subject);
			if(!empty($file)) {
				$message->attach($file);
			}
		});
	}


	public function contact($email, $data = []) {
		if(empty($email)) {
			$email = 'clytle@physicians-ally.com';
		}
		$subject = 'Physicians Ally : Contact Form';
		$view = 'emails.contact';
		$this->sendTo($email, $subject, $view, $data);
	}


//	public function activate($email, $data = []) {
//		if(empty($email)) {
//			$email = 'clytle@physicians-ally.com';
//		}
//		$subject = 'Physicians Ally : Info Form';
//		$view = 'emails.infoform';
//		$this->sendTo($email, $subject, $view, $data);
//	}
//
//	public function attachFile($email, $subject, $file, $data = []) {
//		$view = 'emails.attachfile';
//		$this->sendTo($email, $subject, $view, $data, $file);
//	}

}
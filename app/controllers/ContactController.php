<?php

class ContactController extends BaseController {

    public function __construct() {
      	$this->beforeFilter('csrf', ['on' => ['post', 'put', 'patch', 'delete']]);
	}


	public function send()
	{
		$data = Input::all();
		$rules = [
			'full_name' => ['required', 'min:3', 'max:35'],
		    'email' => ['required', 'email'],
		    'content' => ['required', 'min:10', 'max:600']
		];

		$validator = Validator::make($data, $rules);

		if ($validator->fails())
			return Alert::formError($validator);

		Mailing::contact($data);

		return Alert::flash(Lang::get('contact.sent'), 'success');
	}
}
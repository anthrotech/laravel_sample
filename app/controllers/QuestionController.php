<?php

class QuestionController extends BaseController {

    public function __construct() {
      	$this->beforeFilter('auth', ['only' => ['edit', 'update']]);
      	$this->beforeFilter('csrf', ['on' => ['post', 'put', 'patch', 'delete']]);
	}


}
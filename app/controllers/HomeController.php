<?php

class HomeController extends BaseController {


	public function index()
	{
		$currentQuestion = Question::getCurrentQuestion();

		return View::make('home.index')->with([
			'question' => $currentQuestion
		]);
	}
	
	public function pages() {
		$get_page = Page::getPageBySlug(Input::get('p'));
		
		$title = $get_page[0]->title;
		
		return View::make('home.pages')->with([
			'page' 		   	   => $get_page,
			'title'			   => $title
		]);			
	}

}

<?php


Route::get('/about_us', ['as' => 'about_us', 'uses' => function() {
	return View::make('about.us')->with(['title' => 'About Us']);
}]);


Route::get('/about_site', ['as' => 'about_site', 'uses' => function() {
	return View::make('about.site')->with(['title' => 'About Site']);
}]);
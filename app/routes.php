<?php

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);


require('routes/user.php');

require('routes/questions.php');

require('routes/posts.php');

require('routes/archives.php');

require('routes/contact.php');

require('routes/about.php');

require('routes/privacy_policy.php');

require('routes/terms_of_use.php');

require('routes/report_error.php');

require('routes/report_post.php');

require('routes/admin.php');


Route::get('/comment', function() {
	return View::make('questions.comment')->with(['title' => 'Comment']);;
});

Route::get('/wizards', function() {
	return View::make('wizards.index')->with(['title' => 'Wizards']);;
});

Route::get('/connectors', function() {
    return View::make('connectors.index')->with(['title' => 'Connectors']);;
});

Route::get('/accessdenied', function() {
    return View::make('errors.403')->with(['title' => 'Access Denied']);;
});

Route::get('/pages', ['as' => 'page.show', 'uses' => 'HomeController@Pages']);
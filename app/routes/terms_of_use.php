<?php

Route::get('/terms_of_use', ['as' => 'terms_of_use', 'uses' => function() {
	return View::make('terms.index')->with(['title' => 'Terms of Use']);
}]);
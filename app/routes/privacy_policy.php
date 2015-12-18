<?php

Route::get('/privacy_policy', ['as' => 'privacy_policy', 'uses' => function() {
	return View::make('privacy.index')->with(['title' => 'Privacy Policy']);
}]);
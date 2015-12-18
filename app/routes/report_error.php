<?php

Route::get('/report_error', ['as' => 'report_error', 'uses' => function() {
	return View::make('errors.report')->with(['title' => 'Report Error']);
}]);
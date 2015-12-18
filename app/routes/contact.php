<?php

Route::get('/contact', ['as' => 'contact', function() { return View::make('contact.index')->with(['title' => 'Contact Us']); }]);

Route::post('/contact', ['as' => 'contact', 'uses' => 'ContactController@send']);


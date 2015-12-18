<?php

Route::get('/register', ['as' => 'register', function() {  return View::make('user.register');  }])->before('guest');
Route::post('/register', ['as' => 'register','uses' => 'UserController@register']);


Route::get('/login', ['as' => 'login', 'uses' => 'UserController@login']);
Route::post('/login', ['as' => 'login', 'uses' => 'UserController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'UserController@logout']);


Route::get('/facebook-login/{code?}', ['as' => 'facebook', 'uses' => 'UserController@facebookLogin']);
Route::get('/twitter-login/{code?}', ['as' => 'twitter', 'uses' => 'UserController@twitterLogin']);


Route::get('/activate_account/{token}', 'UserController@activateAccount');
Route::get('/resend-confirmation', 'UserController@resendActivation');


Route::get('/password/reset', ['as' => 'password.reminder', function() { return View::make('user.password.reminder'); }]);
Route::post('/password/reset', ['as' => 'password.request', 'uses' => 'UserController@passwordRequest']);
Route::get('/password/reset/{token}', ['as' => 'password.reset', 'uses' => 'UserController@passwordReset']);
Route::post('/password/reset/{token}', ['as' => 'password.reset', 'uses' => 'UserController@passwordUpdate']);


Route::get('/profile/{username}', ['as' => 'profile', 'uses' => 'ProfileController@index']);
Route::post('/profile/{username}', ['as' => 'profile', 'uses' => 'ProfileController@saveProfile']);

Route::get('/settings', ['as' => 'settings', 'uses' => 'SettingsController@index']);
Route::post('/settings', ['as' => 'settings', 'uses' => 'SettingsController@saveSettings']);
Route::get('/settings/send', ['as' => 'settings.send', 'uses' => 'SettingsController@sendNotifications']);

Route::get('/archive/{username}', ['as' => 'archive', 'uses' => 'ArchiveController@showArchive']);

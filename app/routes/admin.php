<?php

Route::group(array('before' => 'admin'), function() {

Route::get('/admin/pages', ['as' => 'admin.pages.list', 'uses' => 'ProfileController@adminListPages']);
Route::get('/admin/pages/{id}/show', ['as' => 'admin.page.show', 'uses' => 'ProfileController@adminPage']);
Route::post('/admin/pages/{id}/update', ['as' => 'admin.page.update', 'uses' => 'ProfileController@adminUpdatePage']);
Route::get('/admin/pages/{id}/delete', ['as' => 'admin.page.delete', 'uses' => 'ProfileController@adminDeletePage']);

Route::get('/admin/posts', ['as' => 'admin.posts.list', 'uses' => 'ProfileController@adminListPosts']);
Route::get('/admin/posts/{id}/deactivate', ['as' => 'admin.user.deactivate', 'uses' => 'ProfileController@adminDeactivatePost']);
Route::get('/admin/posts/{id}/activate', ['as' => 'admin.user.activate', 'uses' => 'ProfileController@adminActivatePost']);

Route::get('/admin/questions', ['as' => 'admin.questions.list', 'uses' => 'ProfileController@adminListQuestions']);
Route::get('/admin/questions/{id}/show', ['as' => 'admin.question.show', 'uses' => 'ProfileController@adminQuestion']);
Route::post('/admin/questions/{id}/update', ['as' => 'admin.question.update', 'uses' => 'ProfileController@adminUpdateQuestion']);
Route::get('/admin/questions/create', ['as' => 'admin.question.new', 'uses' => 'ProfileController@adminCreateQuestion']);
Route::post('/admin/questions/create', ['as' => 'admin.question.create', 'uses' => 'ProfileController@adminSaveQuestion']);
Route::get('/admin/questions/{id}/deactivate', ['as' => 'admin.question.deactivate', 'uses' => 'ProfileController@adminDeactivateQuestion']);
Route::get('/admin/questions/{id}/activate', ['as' => 'admin.question.activate', 'uses' => 'ProfileController@adminActivateQuestion']);

Route::get('/admin/users', ['as' => 'admin.users.list', 'uses' => 'ProfileController@adminListUsers']);
Route::get('/admin/users/{id}/show', ['as' => 'admin.user.show', 'uses' => 'ProfileController@adminUser']);
Route::post('/admin/users/{id}/update', ['as' => 'admin.user.update', 'uses' => 'ProfileController@adminUpdateUser']);
Route::get('/admin/users/{id}/deactivate', ['as' => 'admin.user.deactivate', 'uses' => 'ProfileController@adminDeactivateUser']);
Route::get('/admin/users/{id}/activate', ['as' => 'admin.user.activate', 'uses' => 'ProfileController@adminActivateUser']);

});
<?php


Route::get('/question', ['as' => 'submit', 'uses' => 'PostController@index']);

Route::get('/post/{id}/{slug}', ['as' => 'post', 'uses' => 'PostController@show']);

Route::get('/post/options', ['as' => 'post-options', 'uses' => 'PostController@postOptions']);

Route::get('/post/text', ['as' => 'post-text', 'uses' => 'PostOptionController@text']);
Route::post('/post/text', ['as' => 'post-text', 'uses' => 'PostOptionController@storeText']);

Route::get('/post/video', ['as' => 'post-video', 'uses' => 'PostOptionController@video']);
Route::post('/post/video', ['as' => 'post-video', 'uses' => 'PostOptionController@storeVideo']);

Route::get('/post/photo', ['as' => 'post-photo', 'uses' => 'PostOptionController@photo']);
Route::post('/post/photo', ['as' => 'post-photo', 'uses' => 'PostOptionController@storePhoto']);

Route::get('/post/audio', ['as' => 'post-audio', 'uses' => 'PostOptionController@audio']);
Route::post('/post/audio', ['as' => 'post-audio', 'uses' => 'PostOptionController@storeAudio']);

Route::get('/post/link', ['as' => 'post-link', 'uses' => 'PostOptionController@link']);
Route::post('/post/link', ['as' => 'post-link', 'uses' => 'PostOptionController@storeLink']);

Route::get('/post/vine', ['as' => 'post-vine', 'uses' => 'PostOptionController@vine']);
Route::post('/post/vine', ['as' => 'post-vine', 'uses' => 'PostOptionController@storeVine']);


Route::get('/post/{id}/{slug}/thumbs-up', ['as' => 'thumbs-up', 'uses' => 'PostController@thumbsUp']);
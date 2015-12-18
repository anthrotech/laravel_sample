<?php

Route::get('/report-post/{id}', ['as' => 'report-post', 'uses' => 'PostController@reportPost']);
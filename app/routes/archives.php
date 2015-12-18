<?php

Route::get('/archives', ['as' => 'archives', 'uses' => 'ArchiveController@index']);
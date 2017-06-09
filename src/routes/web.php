<?php

Route::group(['prefix' => 'message', 'namespace' => 'Inspirium\Messaging\Controllers', 'middleware' => ['web', 'auth']], function() {
	Route::get('thread/{id}', 'MessageController@showThread');
});
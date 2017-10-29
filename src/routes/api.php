<?php

Route::group(['middleware' => ['api', 'auth:api'], 'namespace' => 'Inspirium\Messaging\Controllers\Api', 'prefix' => 'api/thread'], function() {
	Route::get('{id}', 'ThreadController@getThread');
	Route::post('{id}/message', 'ThreadController@postMessage');
});
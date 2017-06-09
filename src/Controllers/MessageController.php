<?php

namespace Inspirium\Messaging\Controllers;

use App\Http\Controllers\Controller;

class MessageController extends Controller {

	public function showThread($id) {
		return view(config('app.template') . '::messages.thread');
	}
}
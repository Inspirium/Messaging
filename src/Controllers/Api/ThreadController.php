<?php
namespace Inspirium\Messaging\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inspirium\Messaging\Models\Message;
use Inspirium\Messaging\Models\Thread;

class ThreadController extends Controller {

	public function getThread($id) {
		return response()->json(Thread::find($id));
	}

	public function postMessage(Request $request, $id) {
		$thread = Thread::find($id);
		if ($thread) {
			$thread->messages()->create(
				['message' => $request->input('message'), 'sender_id' => \Auth::id()]
			);
			$thread->load('messages');
			return response()->json($thread);
		}
		return false;
	}
}
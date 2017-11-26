<?php

namespace Inspirium\Messaging\Observers;

use Inspirium\Messaging\Models\Message;
use Inspirium\Messaging\Notifications\NewMessage;

class MessageObserver {

	public function created(Message $message) {
		foreach($message->thread->users as $user) {
			if ($message->sender->id !== $user->id){
				$user->notify(new NewMessage($message));
			}
		}
	}
}
<?php

namespace Inspirium\Messaging\Observers;


use Inspirium\Messaging\Models\Thread;
use Inspirium\Messaging\Notifications\NewThread;
use Inspirium\TaskManagement\Notifications\TaskAssigned;

class ThreadObserver {
	public function assigned(Thread $thread) {
		dd('assigned');
		foreach($thread->users as $employee) {
			if ($thread->connection_type === 'Inspirium\TaskManagement\Models\Task') {
				$employee->notify(new TaskAssigned($thread->connection));
			}
			else {
				$employee->notify(new NewThread($thread));
			}
		}
	}
}
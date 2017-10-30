<?php

namespace Inspirium\Messaging;

use Illuminate\Support\ServiceProvider;
use Inspirium\Messaging\Models\Message;
use Inspirium\Messaging\Models\Thread;
use Inspirium\Messaging\Observers\MessageObserver;
use Inspirium\Messaging\Observers\ThreadObserver;

class MessagingServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
	    $this->loadMigrationsFrom(__DIR__ . '/database');

	    $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
	    $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

	    Message::observe(MessageObserver::class);
	    Thread::observe(ThreadObserver::class);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

    }
}
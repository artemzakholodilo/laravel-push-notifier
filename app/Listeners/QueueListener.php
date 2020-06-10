<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class QueueListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param string $event
     * @param array $payload
     */
    public function handle(string $event, array $payload)
    {
        if ($event === 'message.received') {
            echo 123;
        }
        echo 123;
    }
}

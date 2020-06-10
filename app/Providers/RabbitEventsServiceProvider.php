<?php

namespace App\Providers;

class RabbitEventsServiceProvider extends \Nuwber\Events\RabbitEventsServiceProvider
{

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'message.received' => [
            'App\\Listeners\\QueueListener'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        //
    }
}

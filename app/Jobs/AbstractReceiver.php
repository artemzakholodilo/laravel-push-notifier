<?php

namespace App\Jobs;

use PhpAmqpLib\Connection\AMQPStreamConnection;

abstract class AbstractReceiver
{
    protected function getConnection()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare('test', false, false, false, false);

        return $channel;
    }

    abstract public function handle();
}

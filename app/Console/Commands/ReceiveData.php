<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpAmqpLib\Channel\AbstractChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class ReceiveData extends Command
{
    /**
     * @var AbstractChannel|\PhpAmqpLib\Channel\AMQPChannel
     */
    private AbstractChannel $channel;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:receive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Receive queue data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $this->channel = $connection->channel();

        $this->channel->queue_declare('received_data', false, false, false, false);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
            sleep(substr_count($msg->body, '.'));
            echo " [x] Done\n";
            event(new \App\Events\OrderCreated(
                    [
                        ['message' => 'Hello'],
                        ['message' => 'World']
                    ]
                )
            );
        };

        $this->channel->basic_qos(null, 1, null);
        $this->channel->basic_consume('received_data', '', false, false, false, false, $callback);

        while(count($this->channel->callbacks)) {
            try {
                $this->channel->wait();
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}

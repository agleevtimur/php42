<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('logs', false, true, false, false);

echo "Waiting for logs\n";

$callback = function ($msg) {
    $des = fopen("log{$msg->getConsumerTag()}", 'a');
    fwrite($des, "$msg->body\n");
    echo "Message has been logged!\n";
    fclose($des);
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$rand = rand(0, 1000);
$channel->basic_qos(null, 1, null);
$channel->basic_consume('logs', $rand, false, false, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
}

$channel->close();
$connection->close();

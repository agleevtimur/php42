<?php

declare(strict_types=1);

$redis = setRedisServer();

if ($_POST !== []) {
    $name = getRequestData('name');
    $comment = getRequestData('comment');

    if (isset($name) && isset($comment)) {
        $redis->incr('comments_count');
        $redis->hset('comments', $redis->get('comments_count'), serialize(['name' => $name, 'comment' => $comment]));
    }
}

$fields = $redis->hgetall('comments');
foreach ($fields as $field) {
    $field = unserialize($field);
    echo "{$field['name']} - {$field['comment']}\n";
}



function getRequestData(string $key): ?string
{
    return $_POST[$key] ?? null;
}

function setRedisServer(): Predis\Client
{
    require 'vendor/autoload.php';
    Predis\Autoloader::register();
    try {
        return new Predis\Client();
    }
    catch (Exception $e) {
        die($e->getMessage());
    }
}
<?php

declare(strict_types=1);

$redis = connectRedisServer();

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $fields = $redis->hgetall('comments');

    require 'front/header.html';
    require 'front/form.html';

    foreach ($fields as $field) {
        $field = unserialize($field);
        echoComment($field['name'], $field['comment'], $field['date']);
    }

    require 'front/footer.html';
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)) {
    $date = date('d-m-Y h:i');
    $serializedData = serialize(['name' => $_POST['name'], 'comment' => $_POST['comment'], 'date' => $date]);
    $redis->incr('comments_count');
    $redis->hset('comments', $redis->get('comments_count'), $serializedData);

    echo $date;
} else {
    die('request error');
}

function connectRedisServer(): Predis\Client
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

function echoComment(string $name, string $text, string $date): void
{
    echo "<div class='comment'>
        <h6>$name</h6>
        <p>$text</p>
        <span class='datetime'>$date</span>
        <hr>
    </div>";
}
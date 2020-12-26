<?php

declare(strict_types=1);

namespace App\Service;

use Generator;
use Predis\Client;

class RedisCommentRepository implements ICommentRepository
{
    private Client $redis;

    public function __construct()
    {
        $this->redis = new Client();
    }

    function getAll(): Generator
    {
        $fields = $this->redis->hgetall('comments');

        foreach ($fields as $field) {
            yield unserialize($field);
        }
    }

    function save(array $comment): void
    {
        $serializedData = serialize(['name' => $comment['name'], 'comment' => $comment['comment'], 'date' => $comment['date']]);
        $this->redis->incr('comments_count');
        $this->redis->hset('comments', $this->redis->get('comments_count'), $serializedData);
    }
}
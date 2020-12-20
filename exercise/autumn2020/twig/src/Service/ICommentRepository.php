<?php

declare(strict_types=1);

namespace App\Service;


use Generator;

interface ICommentRepository
{
    function getAll(): Generator;

    function save(array $comment): void;
}
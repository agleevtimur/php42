<?php

$name = getRequestData('name');
$comment = getRequestData('comment');







function getRequestData(string $key): string
{
    return $_POST[$key] ?? "";
}
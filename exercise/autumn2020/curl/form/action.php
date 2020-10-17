<?php

declare(strict_types=1);

$name = getRequestData('name');
$age = getRequestData('age', 0);
$city = getRequestData('city');

$file = fopen('data.txt', 'w');
fwrite($file, serialize(['name' => $name, 'age' => $age, 'city' => $city]));
fclose($file);

echo 'answers has been saved!';

function getRequestData(string $key, int|string $default = ""): int|string
{
    return isset($_POST[$key]) ? $_POST[$key]: $default;
}
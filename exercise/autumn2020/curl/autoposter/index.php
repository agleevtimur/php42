<?php

$data = ['name' => 'autoposter', 'age' => 0, 'city' => 'kazan'];

$curl = curl_init('localhost:8000/action.php');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36');
$res = curl_exec($curl);
curl_close($curl);

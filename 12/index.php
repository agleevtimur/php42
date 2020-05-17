<?php
// в качестве прошлой практики использую задание 2
session_name('proxy');
session_start();

$value = isset($_SESSION['input']) ? $_SESSION['input'] : '';
echo ("
    <form action='index.php' method='post'>
        <input type='text' name='text' value=$value><br>
        <input type='submit'>
    </form>");

if (isset($_REQUEST['text'])) 
{// обновление/инициализация переменной input
  $_SESSION['input'] = $_REQUEST['text'];

  $query = http_build_query(array('text' => $_REQUEST['text']));
  //практику 2 запустил на другом порту для сетевого обращения к нему
  $url = "http://localhost:8000/index.php"; 
  $opt = [
    'http' => [
      'method' => 'POST',
      'header'  => 'Content-type: application/x-www-form-urlencoded',
      'content' => $query
    ]
  ];
  //отправляем запрос
  echo file_get_contents($url, false, stream_context_create($opt));
}

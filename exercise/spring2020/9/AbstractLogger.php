<?php
abstract class AbstractLogger
{
  abstract protected function Print($text);
  public function Log($text) // вывод в лог
  {
    $result = [];
    $lines = explode(PHP_EOL,$text);
    foreach ($lines as $line) {
      $message = 'Строка ' . '"' . $line . '"';
      if (!preg_match("/(?=(.*[[:upper:]].*))/", $line)) $message .= ' не';
      $message .= ' содержит заглавные буквы';
      array_push($result,$message);
    }
    $this->Print($result); // каждый класс имеет свой Print
  }
}
?>
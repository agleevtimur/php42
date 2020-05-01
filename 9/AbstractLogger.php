<?php
abstract class AbstractLogger
{
  private $_log_file;
  protected function __construct()
  {
    $this->_log_file = fopen('log.txt',"w");
  }
  abstract protected function Print(string $text);
  public function Log($text)
  {
    $this->Print($text);
    $lines = explode(PHP_EOL,$text);
    if ($this->_log_file)
    {
      foreach ($lines as $line) {
        $message = 'Строка ' . '"' . $line . '"';
        if (!preg_match("/(?=(.*[[:upper:]].*))/", $line)) $message .= ' не';
        $message .= ' содержит заглавные буквы' . PHP_EOL;
        fwrite($this->_log_file, $message);
      }
    }
  }
  protected function __destruct()
  {
    fclose($this->_log_file);
  }
}
?>
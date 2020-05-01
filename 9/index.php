<?php
date_default_timezone_set('Europe/Moscow');
include('index.html');
include('AbstractLogger.php');
include('EchoPrint.php');
include('FilePrint.php');

class Controller
{
  private $_logger;
  public function __construct(AbstractLogger $logger)
  {
    $this->_logger = $logger;
  }
  public function Run($text)
  {
    $this->_logger->Log($text);
  }
}

$logger;
if (isset($_REQUEST['log'])) {
  if ($_REQUEST['log'] == 'file' || $_REQUEST['log'] == 'browser') {
    if ($_REQUEST['log'] == 'file') {
      $file_name = empty($_REQUEST['file-name'])? 'file.txt'  : $_REQUEST['file-name'];
      $logger = new FilePrint($file_name);
    }
    else if ($_REQUEST['log'] == 'browser') {
      if (isset($_REQUEST['mode'])) $logger = new EchoPrint($_REQUEST['mode']);
      else echo 'не указан тип вывода в браузер';
    }
    if (isset($_REQUEST['text'])) {
      $controller = new Controller($logger);
      $controller->Run($_REQUEST['text']);
    }
    else echo 'введите текст';
  }
  else echo 'не правильный тип логгера';
}
else echo 'не указан тип логгера';
?>
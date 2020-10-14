<?php
class Controller // класс необходимый для полиморфизма и выхода на еще 1 уровень абстракции
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
?>
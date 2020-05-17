<?php
use Exceptions as Ex;
class Controller implements IController
{ // 4 метода, которые случайно выкидывают 2 исключения
  public array $Exceptions;
  private $rnd;
  function methodOne()
  {
    $this->rnd = $this->getRandom();
    $this->makeTwoRndExceptions();
  }
  function methodTwo()
  {
    $this->methodOne();
  }
  function methodThree()
  {
    $this->methodOne();
  }
  function methodFour()
  {
    $this->methodOne();
  }
  private function getRandom():int
  {
    return rand(1,10);
  }
  private function makeTwoRndExceptions()
  { // различные попарные комбинации исключений
    switch ($this->rnd) {
      case '1':
        $this->Exceptions = array(new Ex\ExceptionOne(), new Ex\ExceptionTwo());
        break;
      case '2':
        $this->Exceptions = array(new Ex\ExceptionOne(), new Ex\ExceptionThree());
        break;
      case '3':
        $this->Exceptions = array(new Ex\ExceptionOne(), new Ex\ExceptionFour());
        break;
      case '4':
        $this->Exceptions = array(new Ex\ExceptionOne(), new Ex\ExceptionFive());
        break;
      case '5':
        $this->Exceptions = array(new Ex\ExceptionTwo(), new Ex\ExceptionThree());
        break;
      case '6':
        $this->Exceptions = array(new Ex\ExceptionTwo(), new Ex\ExceptionFour());
        break;
      case '7':
        $this->Exceptions = array(new Ex\ExceptionTwo(), new Ex\ExceptionFive());
        break;
      case '8':
        $this->Exceptions = array(new Ex\ExceptionThree(), new Ex\ExceptionFour());
      break;
      case '9':
        $this->Exceptions = array(new Ex\ExceptionThree(), new Ex\ExceptionFive());
        break;
      case '10':
        $this->Exceptions = array(new Ex\ExceptionFour(), new Ex\ExceptionFive());
      break;
      default:
        break;
    }
  }
}
?>
<?php
use Exceptions as Ex;
class Controller implements IController
{ // 4 метода, которые случайно выкидывают 2 исключения
  private $rnd;
  function methodOne()
  {
    $this->rnd = $this->getRandom();
    $this->throwTwoRndExceptions();
  }
  function methodTwo()
  {
    $this->rnd = $this->getRandom();
    $this->throwTwoRndExceptions();
  }
  function methodThree()
  {
    $this->rnd = $this->getRandom();
    $this->throwTwoRndExceptions();
  }
  function methodFour()
  {
    $this->rnd = $this->getRandom();
    $this->throwTwoRndExceptions();
  }
  private function getRandom():int
  {
    return rand(1,10);
  }
  private function throwTwoRndExceptions()
  { // различные попарные комбинации исключений
    switch ($this->rnd) {
      case '1':
        $this->throwException(new Ex\ExceptionOne(), new Ex\ExceptionTwo());
        break;
      case '2':
        $this->throwException(new Ex\ExceptionOne(), new Ex\ExceptionThree());
        break;
      case '3':
        $this->throwException(new Ex\ExceptionOne(), new Ex\ExceptionFour());
        break;
      case '4':
        $this->throwException(new Ex\ExceptionOne(), new Ex\ExceptionFive());
        break;
      case '5':
        $this->throwException(new Ex\ExceptionTwo(), new Ex\ExceptionThree());
        break;
      case '6':
        $this->throwException(new Ex\ExceptionTwo(), new Ex\ExceptionFour());
        break;
      case '7':
        $this->throwException(new Ex\ExceptionTwo(), new Ex\ExceptionFive());
        break;
      case '8':
        $this->throwException(new Ex\ExceptionThree(), new Ex\ExceptionFour());
      break;
      case '9':
        $this->throwException(new Ex\ExceptionThree(), new Ex\ExceptionFive());
        break;
      case '10':
        $this->throwException(new Ex\ExceptionFour(), new Ex\ExceptionFive());
      break;
      default:
        break;
    }
  }
  private function throwException($ex1, $ex2)
  {
    try{
      throw $ex1;
    }
    catch(Exception $ex1){
      echo 'исключение: ' . $ex1->getMessage() . '<br/>';
    }
    try{
      throw $ex2;
    }
    catch(Exception $ex2){
      echo 'исключение: ' . $ex2->getMessage();
    }
  }
}
?>
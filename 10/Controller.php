<?php
use Exceptions as Ex;
class Controller implements IController
{ // 4 метода, которые случайнthrow newrivate $rnd;
  function methodOne()
  {
    $this->makeRndExceptions();
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
  private function makeRndExceptions()
  { // различные попарные комбинации исключений
    $rnd = rand(1,5);
    switch ($rnd) {
      case '1':
        throw new Ex\ExceptionOne();
        break;
      case '2':
        throw new Ex\ExceptionTwo();
        break;
      case '3':
        throw new Ex\ExceptionThree();
        break;
      case '4':
        throw new Ex\ExceptionFour();
        break;
      case '5':
        throw new Ex\ExceptionFive();
        break;
      default:
        break;
    }
  }
}
?>
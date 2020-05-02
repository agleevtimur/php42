<?php
class Controller implements IController
{
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
  {
    switch ($this->rnd) {
      case '1':
        $this->throwException(new Exceptions\ExceptionOne("ExceptionOne"), 
        new Exceptions\ExceptionTwo("ExceptionTwo"));
        break;
      case '2':
        $this->throwException(new Exceptions\ExceptionOne("ExceptionOne"), 
        new Exceptions\ExceptionThree("ExceptionThree"));
        break;
      case '3':
        $this->throwException(new Exceptions\ExceptionOne("ExceptionOne"), 
        new Exceptions\ExceptionFour("ExceptionFour"));
        break;
      case '4':
        $this->throwException(new Exceptions\ExceptionOne("ExceptionOne"), 
        new Exceptions\ExceptionFive("ExceptionFive"));
        break;
      case '5':
        $this->throwException(new Exceptions\ExceptionTwo("ExceptionTwo"), 
        new Exceptions\ExceptionThree("ExceptionThree"));
        break;
      case '6':
        $this->throwException(new Exceptions\ExceptionTwo("ExceptionTwo"), 
        new Exceptions\ExceptionFour("ExceptionFour"));

        break;
      case '7':
        $this->throwException(new Exceptions\ExceptionTwo("ExceptionTwo"), 
        new Exceptions\ExceptionFive("ExceptionFive"));
        break;
      case '8':
        $this->throwException(new Exceptions\ExceptionThree("ExceptionThree"), 
        new Exceptions\ExceptionFour("ExceptionFour"));
      break;
      case '9':
        $this->throwException(new Exceptions\ExceptionThree("ExceptionThree"), 
        new Exceptions\ExceptionFive("ExceptionFive"));
        break;
      case '10':
        $this->throwException(new Exceptions\ExceptionFour("ExceptionFour"), 
        new Exceptions\ExceptionFive("ExceptionFive"));
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
      try {
        throw $ex2;
      }
      catch(Exception $ex2){
        echo 'исключение: ' . $ex2->getMessage();
      }
    }
  }
}
?>
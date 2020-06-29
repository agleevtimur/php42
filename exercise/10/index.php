<?php
spl_autoload_register(function ($class) {
  require($class . '.php');
});

use Exceptions\ExceptionOne;
use Exceptions\ExceptionTwo;
use Exceptions\ExceptionThree;
use Exceptions\ExceptionFour;
use Exceptions\ExceptionFive;

$obj = new Controller();
$Obj = get_class_methods($obj);
foreach ($Obj as $method) {
  try {
    $obj->$method();
  } catch (ExceptionOne $ex) {
    echo "Исключение: " . $ex->getMessage() . "</br>";
  } catch (ExceptionTwo $ex) {
    echo "Исключение: " . $ex->getMessage() . "</br>";
  } catch (ExceptionThree $ex) {
    echo "Исключение: " . $ex->getMessage() . "</br>";
  } catch (ExceptionFour $ex) {
    echo "Исключение: " . $ex->getMessage() . "</br>";
  } catch (ExceptionFive $ex) {
    echo "Исключение: " . $ex->getMessage() . "</br>";
  }
}

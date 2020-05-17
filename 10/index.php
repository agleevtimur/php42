<?php
spl_autoload_register(function($class)
{
  require($class . '.php');
});

$obj = new Controller();
$obj->methodOne();
foreach ($obj->Exceptions as $item) {
  try{
    throw $item;
  }
  catch(Exception $ex){
    echo 'исключение: ' . $ex->getMessage() . '<br/>';
  }
}

?>
<?php
spl_autoload_register(
  function ($class) {
      include_once $class . '.php';
  }
);

$factory = new factory\FactoryCarToBusStation();
$station = $factory->createStation();
$transport = $factory->createTransport();
$transport->deliver();
$transport->arrive($station);
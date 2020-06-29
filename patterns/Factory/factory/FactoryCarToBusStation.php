<?php
namespace factory;
use transport\AbstractTransport;
use transport\Car;
use station\AbstractStation;
use station\BusStation;

class FactoryCarToBusStation implements AbstractFactory
{
  public function CreateTransport(): AbstractTransport
  {
    return new Car();
  }
  public function CreateStation(): AbstractStation
  {
    return new BusStation();
  }
}
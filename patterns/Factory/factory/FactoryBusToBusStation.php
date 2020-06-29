<?php
namespace factory;
use transport\AbstractTransport;
use transport\Bus;
use station\AbstractStation;
use station\BusStation;

class FactoryBusToBusStation implements AbstractFactory
{
  public function CreateTransport(): AbstractTransport
  {
    return new Bus();
  }
  public function CreateStation(): AbstractStation
  {
    return new BusStation();
  }
}
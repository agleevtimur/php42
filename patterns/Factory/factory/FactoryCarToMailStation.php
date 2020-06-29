<?php
namespace factory;
use transport\AbstractTransport;
use transport\Car;
use station\AbstractStation;
use station\MailStation;

class FactoryCarToMailStation implements AbstractFactory
{
  public function CreateTransport(): AbstractTransport
  {
    return new Car();
  }
  public function CreateStation(): AbstractStation
  {
    return new MailStation();
  }
}

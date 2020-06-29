<?php
namespace transport;
use station\AbstractStation;
class Car implements AbstractTransport
{
  public function deliver()
  {
    echo "the package has been delivered by car </br>";
  }
  public function arrive(AbstractStation $station)
  {
    echo "Car has arrived to the $station->name </br>";
  }
}
<?php
namespace transport;
use station\AbstractStation;
class Bus implements AbstractTransport
{
  public function deliver()
  {
    echo "the package has been delivered by bus </br>";
  }
  public function arrive(AbstractStation $station)
  {
    echo "Bus has arrived to the $station->name </br>";
  }
}
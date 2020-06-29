<?php
namespace station;
class BusStation extends AbstractStation
{

  public function __construct()
  {
    echo "BusStation exists </br>";
    $this->name = "BusStation";
  }
}
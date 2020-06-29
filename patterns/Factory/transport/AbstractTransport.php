<?php
namespace transport;
use station\AbstractStation;
interface AbstractTransport
{
  public function deliver();
  public function arrive(AbstractStation $station);
}
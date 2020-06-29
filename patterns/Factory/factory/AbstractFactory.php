<?php
namespace factory;
use station\AbstractStation;
use transport\AbstractTransport;
interface AbstractFactory
{
  public function createTransport(): AbstractTransport;

  public function createStation(): AbstractStation;
}
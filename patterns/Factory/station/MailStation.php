<?php
namespace station;
class MailStation extends AbstractStation
{

  public function __construct()
  {
    echo "MailStation exists </br>";
    $this->name = "MailStation";
  }
}
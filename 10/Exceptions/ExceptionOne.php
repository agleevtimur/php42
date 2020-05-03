<?php
namespace Exceptions;
class ExceptionOne extends \Exception {
  function __construct() {
    parent::__construct('ExceptionOne');
  }
};
?>
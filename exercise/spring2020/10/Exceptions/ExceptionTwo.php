<?php
namespace Exceptions;
class ExceptionTwo extends \Exception {
  function __construct() {
    parent::__construct('ExceptionTwo');
  }
};
?>
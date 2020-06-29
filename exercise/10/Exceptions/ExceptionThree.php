<?php
namespace Exceptions;
class ExceptionThree extends \Exception {
  function __construct() {
    parent::__construct('ExceptionThree');
  }
};
?>
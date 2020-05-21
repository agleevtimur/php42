<?php

namespace app;

require 'IСomplex.php';
class Complex implements IComplex
{
  private float $real_value;
  private float $imaginary_value;
  function getRealValue(): float
  {
    return $this->real_value;
  }
  function getImaginaryValue(): float
  {
    return $this->imaginary_value;
  }
  function __construct(float $real_value, float $imaginary_value)
  {
    $this->real_value = $real_value;
    $this->imaginary_value = $imaginary_value;
  }
  function add(Complex $value): void
  {
    $this->real_value += $value->getRealValue();
    $this->imaginary_value += $value->getImaginaryValue();
  }
  function sub(Complex $value): void
  {
    $value->mult(new Complex(-1, 0));
    $this->add($value);
  }
  function mult(Complex $value): void
  {
    $real_value = $value->getRealValue();
    $imaginary_value = $value->getImaginaryValue();
    $temp_real_value = $this->real_value * $real_value - $this->imaginary_value * $imaginary_value;
    $this->imaginary_value = $this->real_value * $imaginary_value + $this->imaginary_value * $real_value;
    $this->real_value = $temp_real_value;
  }
  function div(Complex $value): void
  {
    if ($value->getRealValue() != 0 || $value->getImaginaryValue() != 0) {
      $factor = new Complex($value->getRealValue(), (-1) * $value->getImaginaryValue());
      $this->mult($factor);
      $value->mult($factor);
      $this->real_value /= $value->getRealValue();
      $this->imaginary_value /= $value->getRealValue();
    } else throw new \InvalidArgumentException('Деление на 0');
  }
  function getAbs(): float
  {
    return sqrt(pow($this->real_value, 2) + pow($this->imaginary_value, 2));
  }
  function __toString(): string
  {
    $first = $second = "";
    if ($this->real_value == 0) 
    {
      if (abs($this->imaginary_value) == 1) $second = $this->imaginary_value < 0 ? "-i" : "i";
      else $second = $this->imaginary_value == 0 ? "" : $this->imaginary_value . "i";
    }
    else 
    {
      $first = $this->real_value;
      $second = $this->imaginary_value == 0 ? "" : abs($this->imaginary_value) . "i";
      if ($second)
      {
        $second = abs($this->imaginary_value) == 1 ? "i" : $this->imaginary_value . "i";
        $second = $this->imaginary_value > 0 ? " + " . $second : " - " . $second;
      }
    }
    if (empty($first . $second)) return "0";
    else return $first . $second;
  }
}

<?php 

namespace app;

interface IComplex
{
  function add(Complex $value) : void;
  function sub(Complex $value) : void ;
  function mult(Complex $value) : void;
  function div(Complex $value) : void;
  function getAbs() : float;
}
<?php

namespace tests\Complex;

use PHPUnit\Framework\TestCase;
use app\Complex;

require_once('app\Complex.php');

class ComplexTest extends TestCase
{
  private Complex $complex;
  public function setUp(): void
  {
    $this->complex = new Complex(3, 2);
  }
  public function testgetRealValue()
  {
    $this->assertSame(3.0, $this->complex->getRealValue());
  }
  public function testgetImaginaryValue()
  {
    $this->assertSame(2.0, $this->complex->getImaginaryValue());
  }
  /**
   * @dataProvider additionProviderAdd
   */
  public function testadd(Complex $value1, Complex $value2 ,Complex $expected )
  {
    
    $value1->add($value2);
    $this->assertEquals($expected, $value1);
  }
  public function additionProviderAdd()
  {
    return [
      [new Complex(0,0), new Complex(3.1,3), new Complex(3.1,3)],
      [new Complex(6.34,5), new Complex(3.2,3), new Complex(9.54,8)],
    ];
  }
  /**
   * @dataProvider additionProviderSub
   */
  public function testsub(Complex $value1, Complex $value2 ,Complex $expected )
  {
    $value1->sub($value2);
    $this->assertEquals($expected, $value1);
  }
  public function additionProviderSub()
  {
    return [
      [new Complex(0,0), new Complex(3.1,3), new Complex(-3.1,-3)],
      [new Complex(6.34,5), new Complex(3.2,3), new Complex(3.14,2)],
    ];
  }
   /**
   * @dataProvider additionProviderMult
   */
  public function testmult(Complex $value1, Complex $value2 ,Complex $expected )
  {
    $value1->mult($value2);
    $this->assertEquals($expected, $value1);
  }
  public function additionProviderMult()
  {
    return [
      [new Complex(0,0), new Complex(3.1,3), new Complex(0,0)],
      [new Complex(1,-1), new Complex(3,6), new Complex(9,3)],
    ];
  }
  /**
   * @dataProvider additionProviderDiv
   */
  public function testdiv(Complex $value1, Complex $value2 ,Complex $expected )
  {
    
    $value1->div($value2);
    $this->assertEquals($expected, $value1);
  }
  public function additionProviderDiv()
  {
    return [
      [new Complex(13,1), new Complex(7,-6), new Complex(1,1)]
    ];
  }
  public function testdivZero()
  {
    $this->expectException(\InvalidArgumentException::class);
    $this->complex->div(new Complex(0,0));
  }
  /**
   * @dataProvider additionProviderAbs
   */
  public function testabs(Complex $value1,float $expected )
  {
    $epsilon = 0.001;
    $result = $value1->getAbs();
    if (abs($result - $expected) < $epsilon) $this->assertTrue(true);
    else $this->assertTrue(false);
  }
  public function additionProviderAbs()
  {
    return [
      [new Complex(13,1), 13.0384],
      [new Complex(4,5), 6.40312]
    ];
  }
  /**
   * @dataProvider additionProviderToString
   */
  public function testtoString(Complex $value1,string $expected )
  {
    $this->assertEquals($value1->__toString(), $expected);
  }
  public function additionProviderToString()
  {
    return [
      [new Complex(13,1), "13 + i"],
      [new Complex(13,-1), "13 - i"],
      [new Complex(0,-1), "-i"],
      [new Complex(0,0), "0"],
      [new Complex(2,0), "2"]
    ];
  }
}

<?php 
class EchoPrint extends AbstractLogger
{
  private $_mode;
  public function __construct($mode)
  {
    $this->_mode = $mode;
  }
  protected function Print($text)
  {
    $result = '';
    foreach($text as $line){
      $result .= "<br>" . $line; 
    }
    $temp_date = '';
    switch ($this->_mode)
    {
      case 1: 
        $temp_date = date("Y-m-d H:i") . ' ';
        break;
      case 2:
        $temp_date = date("H:i:s") . ' ';
        break;
      default: break;
    }
    echo $temp_date . $result;
  }
}
?>
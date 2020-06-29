<?php 
class FilePrint extends AbstractLogger
{
  private $_file;
  public function __construct(string $fileName)
  {
    $this->_file = fopen($fileName, "w");
  }
  protected function Print($text)
  {
    $result = '';
    foreach($text as $line){
      $result .= PHP_EOL . $line; 
    }
    fwrite($this->_file, $result);
  }
  function __destruct()
  {
    echo 'Успешно записано в файл';
    fclose($this->_file);
  }

}
?>
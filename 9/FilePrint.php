<?php 
class FilePrint extends AbstractLogger
{
  private $_file;
  public function __construct(string $fileName)
  {
    $this->_file = fopen($fileName, "w");
    parent::__construct();
  }
  protected function Print(string $text)
  {
    fwrite($this->_file, $text);
  }
  function __destruct()
  {
    echo 'Успешно записано в файл';
    fclose($this->_file);
    parent::__destruct();
  }

}
?>
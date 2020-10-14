<?php
/**
 * CustomLogger class
 * PHP version 7.*
 * 
 * @category Class
 * @package  CustomLogger
 * @author   AgleevTimur <fantomas2213@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     none
 */
namespace log;

use \Psr\Log\AbstractLogger as AbstractLogger;
/**
 * CustomLogger class
 * PHP version 7.*
 * 
 * @category Class
 * @package  CustomLogger
 * @author   AgleevTimur <fantomas2213@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     none
 */
class CustomLogger extends AbstractLogger
{
    /**
     * File name
     */
    private string $_file_name;
    /**
     * Array for previous json file values
     */
    private $_json_array = [];
    /**
     * Logging
     * 
     * @param $level   log level
     * @param $message log message
     * @param $context log additional context(exceptions)
     * 
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        $this->_json_array[] = array('level' => $level, 'time' => date("H:i:s"), 
        'info' => $message, 'context' => $context);
        file_put_contents($this->_file_name, json_encode($this->_json_array));
    }
    /**
     * Defining log file name
     * 
     * @param string $_file_name description
     */
    public function __construct(string $_file_name)
    {
        $this->_file_name = $_file_name;
        $file = file_get_contents($this->_file_name);
        $this->_json_array = json_decode($file, true)?? [];
    }
    /**
     * Killing local json array
     */
    public function __destruct()
    {
        unset($this->_json_array);
    }
} 

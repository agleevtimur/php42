<?php
/**
 * PHP version 7.*
 * 
 * @category Class
 * @package  MyClass
 * @author   AgleevTimur <fantomas2213@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     none
 */
use Psr\Log\LoggerInterface;
/**
 * Additional class for abstracting
 * PHP version 7.*
 * 
 * @category Class
 * @package  MyClass
 * @author   AgleevTimur <fantomas2213@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     none
 */
class Foo
{
    /**
     * User _logger
     */
    private $_logger;
    /**
     * Defining logger.
     *
     * @param LoggerInterface $_logger Describe
     */
    public function __construct(LoggerInterface $_logger = null)
    {
        $this->logger = $_logger;
    }
    /**
     * Logging action
     *
     * @return void
     */
    public function doSomething()
    {
        if ($this->logger) {
            $this->logger->info('Doing work');
            $this->logger->notice('Notice work');
        }
    }
}

<?php
/**
 * Index file doc comment
 * PHP version 7.*
 * 
 * @category Index
 * @package  MyPackage
 * @author   AgleevTimur <fantomas2213@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     none
 */
use log\CustomLogger;
spl_autoload_register(
    function ($class) {
        include_once $class . '.php';
    }
);

require_once realpath("vendor/autoload.php");
$logger = new CustomLogger('log.json');
$foo = new Foo($logger);
$foo->doSomething();

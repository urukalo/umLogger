<?php

namespace umLogger\handlers;

use Psr\Log\LogLevel;

/**
 * Description of umLoggerAbstract
 *
 * @author milan
 */
abstract class umHandlerAbstract implements umHandlerInterface {
    /*
     * map PSR3 levels by importance 
     */

    protected $levels = array(
        LogLevel::DEBUG => 100,
        LogLevel::INFO => 200,
        LogLevel::NOTICE => 300,
        LogLevel::WARNING => 400,
        LogLevel::ERROR => 500,
        LogLevel::CRITICAL => 600,
        LogLevel::ALERT => 700,
        LogLevel::EMERGENCY => 800,
    );

    /*
     * minimal level what handler cover
     * (expmle, email handler can react only on Critical+ levels)
     */
    protected $level;

    /*
     * just set log level for instance
     * @param LogLevel
     */

    public function __construct($level = LogLevel::DEBUG) {
        $this->level = $level;
    }

    /*
     * compare log level of message with level what handler will handle
     * @param LogLevel
     */

    public function handleLevel($level) {
        return $this->levels[$level] >= $this->levels[$this->level];
    }

}

<?php

namespace umLogger\handlers;

use Psr\Log\LogLevel;

/**
 * Description of fileHandler
 *
 * @author milan
 */
class echoHandler extends umHandlerAbstract {

    public function __construct($level = LogLevel::DEBUG) {
        parent::__construct($level);
    }

    public function handle($message) {
        echo $message . PHP_EOL. "<br>";
    }

    public function handleLevel($level) {
        return parent::handleLevel($level);
    }

}

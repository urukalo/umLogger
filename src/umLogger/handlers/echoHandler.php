<?php

namespace umLogger\handlers;

use Psr\Log\LogLevel;

/**
 * Description of fileHandler
 *
 * @author milan
 */
class echoHandler extends umHandlerAbstract {

    public function __construct($formatter, $level = LogLevel::DEBUG) {
        parent::__construct($formatter, $level);
    }

    public function handle($message, $content) {
        $data = parent::handle($message, $content);
        
        echo $data . PHP_EOL. "<br>";
    }

    public function handleLevel($level) {
        return parent::handleLevel($level);
    }

}

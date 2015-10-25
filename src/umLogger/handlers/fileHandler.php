<?php

namespace umLogger\handlers;

use Psr\Log\LogLevel;

/**
 * Description of fileHandler
 *
 * @author milan
 */
class fileHandler extends umHandlerAbstract {

    private $filename;

    public function __construct($filename, $level = LogLevel::DEBUG) {
        parent::__construct($level);
        $this->filename = $filename;
    }

    public function handle($message) {
        file_put_contents($this->filename, $message . PHP_EOL, FILE_APPEND);
    }

    public function handleLevel($level) {
        return parent::handleLevel($level);
    }

}

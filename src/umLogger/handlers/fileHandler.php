<?php

namespace umLogger\handlers;

use Psr\Log\LogLevel;
use umLogger\formaters\umFormaterInterface;

/**
 * Description of fileHandler
 *
 * @author milan
 */
class fileHandler extends umHandlerAbstract {

    private $filename;

    public function __construct($filename, umFormaterInterface $formatter, $level = LogLevel::DEBUG) {
        parent::__construct($formatter, $level);
        $this->filename = $filename;
    }

    public function handle($message, $content) {
        $data = parent::handle($message, $content);

        file_put_contents($this->filename, $data, FILE_APPEND);
    }

    public function handleLevel($level) {
        return parent::handleLevel($level);
    }

}

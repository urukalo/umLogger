<?php

namespace umLogger\formaters;

/**
 * Description of textFormater
 *
 * @author milan
 */
class textFormater extends umFormatterAbstract {

    public function __construct() {
        
    }

    public function formate($message, array $content) {
        return parent::formate($message, $content).PHP_EOL;
        
    }

}

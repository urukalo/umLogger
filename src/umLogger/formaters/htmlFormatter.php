<?php

namespace umLogger\formaters;

/**
 * Description of textFormater
 *
 * @author milan
 */
class htmlFormatter extends umFormatterAbstract {

    public function __construct() {
        
    }

    public function formate($message, array $content) {
        return "<p>".parent::formate($message, $content)."</p>";
        
    }

}

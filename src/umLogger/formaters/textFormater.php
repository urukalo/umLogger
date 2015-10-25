<?php

namespace umLogger\formaters;

/**
 * Description of textFormater
 *
 * @author milan
 */
class textFormater implements umFormaterInterface {

    public function __construct() {
        
    }

    public function formate($message, array $content) {

        foreach ($content as $placeholder => $value) {

            $replacement['{' . $placeholder . '}'] = (string) $value;
        }


        return \strtr($message, $replacement);
    }

}

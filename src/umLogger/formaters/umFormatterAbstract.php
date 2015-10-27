<?php

namespace umLogger\formaters;

/**
 * umFormatterAbstract 
 *
 * @author Miki
 */
abstract class umFormatterAbstract implements umFormaterInterface {
    
    /*
     * replace placeholders in message with values from content array
     * @param string
     * @param array
     */
    public function formate($message, array $content) {
        foreach ($content as $placeholder => $value) {

            $replacement['{' . $placeholder . '}'] = (string) $value;
        }

        return \strtr($message, $replacement);
    }

}

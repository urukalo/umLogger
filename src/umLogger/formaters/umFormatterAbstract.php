<?php

namespace umLogger\formaters;

/**
 * Description of umFormatterAbstract
 *
 * @author Miki
 */
abstract class umFormatterAbstract implements umFormaterInterface{
   
    public function formate($message, array $content) {
         foreach ($content as $placeholder => $value) {

            $replacement['{' . $placeholder . '}'] = (string) $value;
        }


        return \strtr($message, $replacement);
    }
}

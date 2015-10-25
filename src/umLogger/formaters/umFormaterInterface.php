<?php

namespace umLogger\formaters;

/**
 *
 * @author milan
 */
interface umFormaterInterface {
  
    public function formate($message, array $content);
}

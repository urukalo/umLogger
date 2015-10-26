<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace umLogger\handlers;

/**
 *
 * @author milan
 */
interface umHandlerInterface {
    
    public function handleLevel($level);
    public function handle($message, $content);
}

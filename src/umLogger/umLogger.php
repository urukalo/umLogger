<?php

namespace umLogger;

use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

/**
 * umLogger implementing PSR-3 logging interface
 *
 * @author milan
 */
class umLogger extends AbstractLogger {

    private $handlers;
    

    public function __construct(array $handlers) {

        if (!is_array($handlers)) {
            $handlers[] = $handlers;
        }
        $this->handlers = $handlers;
    }

    public function log($level, $message, array $context = array()) {

        foreach ($this->handlers as $handler) {
            if ($handler->handleLevel($level)) {
                $handler->handle($message, $context);
            }
        }
    }

    public function logEvent($event, $performer, $subject) {

        $content['event'] = $event;
        $content['level'] = strtoupper(LogLevel::DEBUG);
        $content['performer'] = $performer->username;
        $content['subject_id'] = $subject->id;
        $content['subject'] = $subject->title;
        $content['time'] = (new \DateTime())->format('Y-m-d H:i:s');

        $this->log(LogLevel::DEBUG, "[{level}]: {event} on {time} by {performer} on {subject} with id {subject_id}", $content);
    }

}

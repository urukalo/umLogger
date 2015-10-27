<?php

use umLogger\handlers;
use umLogger\formaters;
use Psr\Log\LogLevel;

require './vendor/autoload.php';

// sample data objects for performer and subject
$user = new stdClass();
$user->username = 'admin';

$article = new stdClass();
$article->id = 1;
$article->title = "New Article";

$textFormater = new formaters\textFormater();
$htmlFormater = new formaters\htmlFormatter();

$handlers = array(
    new handlers\echoHandler($htmlFormater), // DEBUG level handler
    new handlers\fileHandler('logs/umLogger.log', $textFormater, LogLevel::EMERGENCY) // EMERGENCY handler
);

$umLogger = new umLogger\umLogger($handlers);

//specific call with predefined DEBUG level - only one handler will handle this
$umLogger->logEvent("Created new article", $user, $article);

// direct PSR3 call (both handlers will log this)
$umLogger->log(LogLevel::EMERGENCY, "[{level}]: {event} on {time} by {performer} on {subject} with id {subject_id}", array(
    "event" => "Created new article",
    "time" => (new DateTime())->format('Y-m-d H:i:s'),
    "performer" => "admin",
    "subject" => "Test article",
    "subject_id" => 5,
    'level' => strtoupper(LogLevel::EMERGENCY)
));

$message = "[{level}]: {event} on {time} by {performer} on {subject} with id {subject_id}.";

$content = array(
    "event" => "Created new article",
    "time" => (new DateTime())->format('Y-m-d H:i:s'),
    "performer" => "admin",
    "subject" => "Test article",
    "subject_id" => 5,
    'level' => strtoupper(LogLevel::EMERGENCY)
);
$umLogger->emergency($message, $content);

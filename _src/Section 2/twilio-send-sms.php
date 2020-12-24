<?php

require_once __DIR__ . '/../private/bootstrap.php';

$from = ''; // number to send SMS from
$to = '+44'; // number to send the SMS to
$message = 'Hello Packt Tutorial Follower';

$sent = $twilio->account->messages->sendMessage(
    $from,
    $to,
    $message
);

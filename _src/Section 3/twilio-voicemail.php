<?php

require_once __DIR__ . '/../private/bootstrap.php';

$response = new \Services_Twilio_Twiml();

$response->say('Please leave a message. Press any key to finish');

$response->record([
    'maxLength' => 120,
    'playBeep' => true,
    'action' => 'http://public-url/voicemail-record.php',
    'method' => 'POST',
    'finishOnKey' => '1234567890*#'
]);

print $response;

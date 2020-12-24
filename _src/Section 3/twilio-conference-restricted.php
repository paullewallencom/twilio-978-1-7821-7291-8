<?php

require_once __DIR__ . '/../private/bootstrap.php';

$allowed_in_call = [
    '' // numbers to allow in the call
];

$response = new \Services_Twilio_Twiml();

$caller = isset($_REQUEST['From']) ? $_REQUEST['From'] : '';

if (!in_array($caller, $allowed_in_call)) {
    $response->say('Sorry, ou are now allowed to access this conference call');
} else {
    $conference_name = 'Packt Twilio Conference Call';
    $response->say('Welcome to the ' $conference_name);
    $response->dial()->conference($conference_name);
}

print $response;

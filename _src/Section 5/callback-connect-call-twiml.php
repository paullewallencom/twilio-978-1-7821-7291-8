<?php
require_once __DIR__ . '/../private/bootstrap.php';

$response = new \Services_Twilio_Twiml();

$response->dial($_GET['recipient']);
$response->say('There was a problem connecting you to the user');

print $response;

$pusher->trigger(
    'requests.' . md5($_GET['recipient']),
    'request.in_progress',
    ['Your call is in progress']
);

<?php

require_once __DIR__ . '/../private/bootstrap.php';

pushActivity($_POST['Caller'], 'Recorded a message', $pusher);

$response = new \Services_Twilio_Twiml();

$response->say('Thanks for your message');

print $response;

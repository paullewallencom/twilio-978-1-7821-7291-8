<?php

require_once __DIR__ . '/../private/bootstrap.php';

$response = new \Services_Twilio_Twiml();

$conference_name = 'Packt Twilio Conference Call';

$response->say('Welcome to the ' . $conference_name);
$response->dial()->conference($conference_name);

print $response;

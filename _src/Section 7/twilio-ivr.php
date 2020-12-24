<?php

require_once __DIR__ . '/../private/bootstrap.php';

$number = $_POST['Caller'];

pushActivity($number, 'Called the IVR', $pusher);

$menu = [];
$menu[] = 'Press 1 for a joke';
$menu[] = 'Press 2 for the management conference room';
$menu[] = 'Press 3 to speak to Michael';
$menu[] = 'Press 4 to leave a message';
$menu[] = 'Press 5 for some nice music';

$response = new \Services_Twilio_Twiml();

$response->say('Welcome to the Packt Tutorial IVR system');
$response->gather([
    'timeout' => 180,
    'numDigits' => 1,
    'action' => 'http://public-url/twilio-ivr-gather.php',
    'method' => 'POST'
])->say(implode('.', $menu));

print $response;

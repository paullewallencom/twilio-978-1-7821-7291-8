<?php

require_once __DIR__ . '/../private/bootstrap.php';

$response = new \Services_Twilio_Twiml();

$response->say('Thanks for your message');

$recording = (isset($_REQUEST['RecordingUrl'])) ? $_REQUEST['RecordingUrl'] : '';
$recording_duration = (isset($_REQUEST['RecordingDuration'])) ? $_REQUEST['RecordingDuration'] : '';

$digits = (isset($_REQUEST['Digits'])) ? $_REQUEST['Digits'] : '';

mail('your@email.address', 'You have a new message', 'Hello,

You have a new message.

' . $recording_url . ' (lasts ' . $recording_duration . ' seconds)

Thanks,

Packt Video Tutorial');

print $response;

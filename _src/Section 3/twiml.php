<?php

require_once __DIR__ . '/../private/bootstrap.php';

$response = new \Services_Twilio_Twiml();

$response->say('Welcome to the Twilio and Pusher video series from Packt');

$response->play('http://com.twilio.music.ambient.s3.amazonaws.com/gurdonark_-_Plains.mp3', ['loop' => 0]);

print $response;

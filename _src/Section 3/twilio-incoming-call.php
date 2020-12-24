<?php

require_once __DIR__ . '/../private/bootstrap.php';

$number_sid = 'twilio-number-sid';
$voice_url = 'http://public-url/twiml.php';

$number = $twilio->account->incoming_phone_numbers->get($number_sid);

$number->update(['VoiceUrl' => $voice_url]);

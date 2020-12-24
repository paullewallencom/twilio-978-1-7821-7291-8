<?php

require_once __DIR__ . '/../private/bootstrap.php';

$number_sid = 'twilio-number-sid';

$number = $twilio->account->incoming_phone_numbers->get($number_sid);

$voice_url = 'http://public-url/twilio-voicemail.php';

$number->update(['VoiceUrl' => $voice_url]);

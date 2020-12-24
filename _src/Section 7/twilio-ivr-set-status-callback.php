<?php
require_once __DIR__ . '/../private/bootstrap.php';

$number_sid = 'twilio-number-sid';
$voice_url = 'http://public-url/twilio-ivr.php';
$status_url = 'http://public-url/twilio-ivr-status-callback.php';

$number = $twilio->account->incoming_phone_numbers->get($number_sid);
$number->update([
    'StatusCallback' => $status_url,
    'StatusCallbackMethod' => 'POST',
    'VoiceMethod' => 'POST',
    'VoiceUrl' => $voice_url
]);

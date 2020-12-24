<?php

require_once __DIR__ . '/../private/bootstrap.php';

$number_sid = 'twilio-number-sid-goes-here';
$voice_url = 'http://twimlets.com/message?Message%5B0%5D=Hello%20Packt%20Video%20Series%20Viewer!&';

$number = $twilio->account->incoming_phone_numbers->get($number_sid);

$number->update(['VoiceUrl' => $voice_url]);

<?php

require_once __DIR__ . '/../private/bootstrap.php';

$number_sid = 'twilio-number-sid';
$sms_url = 'http://public-url/twilio-sms-reply.php';

$number = $twilio->account->incoming_phone_numbers->get($number_sid);

$number->update(['SmsUrl' => $sms_url, 'SmsMethod' => 'POST']);

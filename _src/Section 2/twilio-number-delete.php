<?php

require_once __DIR__ . '/../private/bootstrap.php';

$number_sid = 'twilio-number-sid-goes-here';

$number = $twilio->account->incoming_phone_numbers->delete($number_sid);

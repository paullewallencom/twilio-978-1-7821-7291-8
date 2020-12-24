<?php

require_once __DIR__.'/../private/bootstrap.php';

$numbers = $twilio->account->available_phone_numbers->getList(
    'GB',
    'Local',
    ['Contains' => '123']
);

foreach ($numbers->available_phone_numbers as $number) {
    echo 'Available: ' . $number->phone_number . '<br />';
}

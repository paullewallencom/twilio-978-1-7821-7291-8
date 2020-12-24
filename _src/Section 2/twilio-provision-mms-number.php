<?php

require_once __DIR__ . '/../private/bootstrap.php';

$numbers = $twilio->account->available_phone_numbers->getList(
    'CA',
    'Local'
);

foreach ($numbers->available_phone_numbers as $number) {
    if (true == $number->capabilities->MMS &&
        true == $number->capabilities->SMS) {
        $buy = $number->phone_number;

        echo $buy . ' is MMS capable <br />';

        $purchased = $twilio->account->incoming_phone_numbers->create([
            'PhoneNumber' => $buy
        ]);

        echo 'Purchased ' . $purchased->phone_number . ' number has sid ' . $purchased->sid;

        break;
    }
}

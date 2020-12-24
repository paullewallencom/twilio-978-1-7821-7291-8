<?php

require_once __DIR__ . '/../private/bootstrap.php';

$response = new \Services_Twilio_Twiml();

if ($_POST['Digits'] == $_GET['code']) {
    $response->say('Thanks; your phone number has been verified. You may now close your browser');

    $pusher->trigger(
    'verification_updates_' . md5($_POST['Called']),
        'verification.successful',
        ['Your phone number has been verified']
    );

    // Mark the user as verified in our database
} else {
    $response->say('Sorry, the code you entered was not correct');
    $pusher->trigger(
        'verification_updates_' . md5($_POST['Called']),
        'verification.failed',
        ['Your phone number could not be verified']
    );
}

print $response;

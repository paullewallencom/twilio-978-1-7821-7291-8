<?php
require_once __DIR__ . '/../private/bootstrap.php';

$number = $_POST['requester'];

$pusher->trigger(
    'requests.' . md5($number),
    'request.processing',
    ['Your call is processing']
);

$call = $twilio->account->calls->create(
    '+', // number to use to connect the two callers
    $_POST['operative'],
    'http://public-url/callback-connect-call-twiml.php?recipient=' . $_POST['requester'],
    [
        'StatusCallback' => 'http://public-url/callback-connect-call-callback.php?recipient=' . $_POST['requester'],
        'StatusCallbackMethod' => 'POST',
        'Method' => 'POST'
    ]
);

<?php
require_once __DIR__ . '/../private/bootstrap.php';

$caller = '+'; // number to call from
$recipient = '+'; // number to call
$twiml_url = 'http://public-url/twiml.php';

$call = $twilio->account->calls->create(
    $caller,
    $recipient,
    $twiml_url
);

echo 'Call initiated with id ' . $call->sid;

sleep(10);

$call->update(['Url' => 'http://public-url/twiml-hangup.php']);

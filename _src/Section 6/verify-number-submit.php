<?php

require_once __DIR__ . '/../private/bootstrap.php';

// generate a random number
$code = rand(1000, 9999);

$call = $twilio->account->calls->create(
    '+441233800557',
    $_POST['number_to_verify'],
    'http://public-url/verify-number-twiml.php?code=' . $code
);

header('Location: verify-in-progress.php?code=' . $code . '&channel=' . md5($_POST['number_to_verify']));

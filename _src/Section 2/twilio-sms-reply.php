<?php

require_once __DIR__ . '/../private/bootstrap.php';

$from = $_POST['To'];
$to = $_POST['From'];
$message = "Hello Packt Tutorial Follower, thanks for your message: . " . $_POST['Body'];

$twilio->account->messages->sendMessage($from, $to, $message);

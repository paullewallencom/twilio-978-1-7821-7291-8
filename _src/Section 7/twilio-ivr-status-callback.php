<?php
require_once __DIR__ . '/../private/bootstrap.php';

$message = 'Call status updated: ' . $_POST['CallStatus'];

$number = $_POST['Caller'];

pushActivity($number, $message, $pusher);

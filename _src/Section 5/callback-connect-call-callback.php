<?php
require_once __DIR__ . '/../private/bootstrap.php';

$number = $_GET['recipient'];

$pusher->trigger(
    'requests.' . md5($number),
    'request.completed',
    ['Your callback has been completed']
);

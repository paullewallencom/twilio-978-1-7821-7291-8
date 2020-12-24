<?php
require_once __DIR__ . '/../private/bootstrap.php';

$channel = 'private-packt4';
$event_name = 'test.event';

$data = [
    'test' => 'data',
    'to' => 'push'
];

$pusher->trigger($channel, $event_name, $data);

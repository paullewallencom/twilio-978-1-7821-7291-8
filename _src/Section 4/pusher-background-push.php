<?php
require_once __DIR__ . '/../private/bootstrap.php';

$job = [
    'event_name' => 'user.registered',
    'id' => 1
];

$pheanstalk()->useTube('pusher')->put(json_encode($job));

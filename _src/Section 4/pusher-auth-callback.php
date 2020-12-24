<?php
require_once __DIR__ . '/../private/bootstrap.php';

echo $pusher->socket_auth(
    $_POST['channel_name'],
    $_POST['socket_id']
);

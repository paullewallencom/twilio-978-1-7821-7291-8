<?php
require_once __DIR__ . '/../private/bootstrap.php';

$channel = 'private-stream';

if ($_POST['channel_name'] == $channel) {
    echo $pusher->socket_auth(
        $_POST['channel_name'],
        $_POST['socket_id']
    );
}


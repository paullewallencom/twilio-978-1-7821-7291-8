<?php
require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/settings.php';

$twilio = new \Services_Twilio(
    $settings['sid'],
    $settings['token']
);

$pusher = new \Pusher(
    $settings['key'],
    $settings['secret'],
    $settings['app_id']
);

$pheanstalk = function () {
    return new \Pheanstalk_Pheanstalk('127.0.0.1');
};

function pushActivity($number, $message, $pusher)
{
    $numbers = [
        '+' => [ // number
            'name' => 'Joe Bloggs',
            'gravatar' => 'http://www.gravatar.com/avatar/' . md5(strtolower(trim('your@email.address'))),
        ]
    ];

    $payload = [
        'number' => $number,
        'message' => $message,
        'time' => date('Y-m-d H:i:s')
    ];

    if (array_key_exists($number, $numbers)) {
        $payload['caller'] = $numbers[$number];
    }

    $pusher->trigger('private-stream', 'update', $payload);
}

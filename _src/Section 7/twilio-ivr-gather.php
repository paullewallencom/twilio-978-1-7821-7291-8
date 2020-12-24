<?php

require_once __DIR__ . '/../private/bootstrap.php';

$digits = (isset($_REQUEST['Digits'])) ? $_REQUEST['Digits'] : null;

$number = $_POST['Caller'];

$response = new \Services_Twilio_Twiml();

switch ($digits) {
    case '1':
        pushActivity($number, 'Asked for a joke', $pusher);
        $response->say('Why did the chicken cross the road');
        break;
    case '2':
        pushActivity($number, 'Connected to the management conference room', $pusher);
        $response->say('Welcome to the management conference room');
        $response->dial()->conference('management');
        break;
    case '3':
        pushActivity($number, 'Connected to Michael', $pusher);
        $response->dial()->number('+'); // number to call
        break;
    case '4':
        pushActivity($number, 'Went to leave a voicemail', $pusher);
        $response->record([
            'maxLength' => '120',
            'playBeep' => true,
            'action' => 'http://public-url/voicemail-record-transcribe.php',
            'method' => 'POST',
            'finishOnKey' => '1234567890*#',
            'transcribe' => true,
            'transcribeCallback' => 'http://public-url/voicemail-transcribe.php'
        ]);
        break;
    case '5':
        pushActivity($number, 'Listened to some music', $pusher);
        $response->play('http://com.twilio.music.ambient.s3.amazonaws.com/gurdonark_-_Plains.mp3');
        break;
}

print $response;

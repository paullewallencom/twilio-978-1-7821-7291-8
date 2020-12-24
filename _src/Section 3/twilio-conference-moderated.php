<?php

require_once __DIR__ . '/../private/bootstrap.php';

$conference_name = 'Packt Twilio Conference Call';

$moderator = '';
$active_participants = [];
$muted = [];

$allowed_in_call = array_merge(
    [$moderator],
    $active_participants,
    $muted
);

$response = new \Services_Twilio_Twiml();

$caller = isset($_REQUEST['From']) ? $_REQUEST['From'] : '';

if (!in_array($caller, $allowed_in_call)) {
    $response->say('Sorry, you are not allowed access to this conference call');
} else {
    $response->say('Welcome to the ' . $conference_name);

    if ($caller == $moderator) {
        $response->say('You are the moderator of this conference call');

        $options = ['startConferenceOnEnter' => true, 'endConferenceOnExit' => true];
    } elseif (in_array($caller, $active_participants)) {
        $options = ['startConferenceOnEnter' => false];
    } elseif (in_array($caller, $muted)) {
        $response->say('You are on mute for this call');
        $options = ['startConferenceOnEnter' => false, 'muted' => true];
    }

    $response->dial()->conference($conference_name, $options);
}

print $response;



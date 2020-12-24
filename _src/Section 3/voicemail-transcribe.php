<?php

require_once __DIR__ . '/../private/bootstrap.php';

$recording_url = (isset($_REQUEST['RecordingUrl'])) ? $_REQUEST['RecordingUrl'] : '';
$from = (isset($_REQUEST['From'])) ? $_REQUEST['From'] : '';
$transcription_status = (isset($_REQUEST['TranscriptionStatus'])) ? $_REQUEST['TranscriptionStatus'] : '';
$transcription_text = (isset($_REQUEST['TranscriptionText'])) ? $_REQUEST['TranscriptionText'] : '';

$message = 'Hello,

You have a new message

' . $recording_url . ' (from: ' . $from . ')

';

if ('completed' === $transcription_status) {
    $message .= 'The message was:

' . $transcription_text;
} else {
    $message .= 'We were unable to transcribe the call';
}

$message .= '

Thanks,

Packt video tutorial';

mail('your@email.address', 'You have a new message', $message);

if ($transcription_status != 'completed') {
    pushActivity($from, 'Tried to leave a voicemail, but transcribing failed', $pusher);
} else {
    pushActivity($from, 'Has left a voicemail: ' . $transcription_text, $pusher);
}

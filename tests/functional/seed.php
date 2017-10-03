<?php

require_once __DIR__ . '/../bootstrap.php';

$mailerHost = getenv('MAILHOG_HOST');
$mailerPort = getenv('MAILHOG_SMTP_PORT');

$transport = (new \Swift_SmtpTransport($mailerHost, $mailerPort));
$mailer = new \Swift_Mailer($transport);

$message = new \Swift_Message('Testmessage1 Subject');
$message
    ->setFrom(['john@doe.com' => 'John Doe'])
    ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
    ->setBody('Here is the message itself')
;

$message2 = new \Swift_Message('Testmessage2 Subject');
$message2
    ->setFrom(['foo@example.com' => 'Foo Bar'])
    ->setTo(['baz@domain.org'])
    ->setBody('Testmessage')
;

$mailer->send($message);
$mailer->send($message2);

<?php

define('MAILHOG_CLIENT_TESTS_ROOT', __DIR__);

require_once  __DIR__ . '/../vendor/autoload.php';

$dotenv = new \Symfony\Component\Dotenv\Dotenv();
$dotenv->load(__DIR__ . '/../.env.dist');

$localEnvFile = __DIR__ . '/../.env';

if (file_exists($localEnvFile)) {
    $dotenv->load($localEnvFile);
}
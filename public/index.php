<?php

echo 'Start';

if (file_exists('../.env')) {
    $env = parse_ini_file('../.env');
    if ($env["APP_MODE"] === 'development') {
        require __DIR__ . '/../src/App/functions.php';
    };
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$app = include __DIR__ . '/../src/App/bootstrap.php';

$app->run();

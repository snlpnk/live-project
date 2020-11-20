<?php

use Source\Support\ChatController;

require __DIR__ . '/vendor/autoload.php';

$app = new Ratchet\App('localhost', 8080);
$app->route('/chat', new ChatController(), ['www.localhost']);

$app->run();
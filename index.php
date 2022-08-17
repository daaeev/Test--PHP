<?php

require __DIR__ . '/vendor/autoload.php';

use App\Core\App;

$router = App::getRouter();

$application = new App($router);

$application->start();
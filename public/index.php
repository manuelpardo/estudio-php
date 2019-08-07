<?php

use TaskList\HomePage;
use Espresso\App\Espresso;
use Zend\Diactoros\Response\HtmlResponse;

// Importamos las librerías vendor con el autoload de composer.
require_once __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config/container.php';

$app = Espresso::create($createContainer());

$app->get('/', HomePage::class);
$app->use(static function () {
    return new HtmlResponse('Not Found', 404);
});

$app->run();
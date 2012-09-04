<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/Bootstrap.php';

$app = new Silex\Application();

// Bootstrap
$app['bootstrap'] = $app->share(function(Silex\Application $app) {
    return new Boostrap($app);
});

$app['bootstrap']->run();

$app->run();
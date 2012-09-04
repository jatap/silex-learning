<?php

namespace Ewo\Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;

class HomeController implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];

        // Home page
        $controllers->get('/', function () {

            return 'Welcome to first Silex Project Home Page';
        });

//        $controllers->get('/{name}', function ($name, Application $app) {
//
//            return 'Hello '. $app->escape($name);
//        });

//        // Testing page
//        $controllers->get('/testing/{name}', function ($name) {
//
//            return new Response("<h1>You are in Testing page {$name}</h1>");
//        });
//
//        // Redirect page
//        $controllers->get('/redirect/{name}', function ($name) use ($app) {
//
//            return $app->redirect('/hello/julio');
//        });

        return $controllers;
    }
}

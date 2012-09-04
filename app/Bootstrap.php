<?php

use Symfony\Component\HttpFoundation\Response;

class Boostrap
{
    /**
     * @var Silex\Application
     */
    protected $_app;

    function __construct(Silex\Application $app)
    {
        $this->_app             = $app;
        $this->_app['debug']    = true;
    }

    public function run()
    {
        $this->_routing();
        $this->_errorHandling();
    }

    protected function _routing()
    {
        $app = $this->_app;

        // Home page
        $app->mount('/home', new Ewo\Controllers\HomeController());
    }

    protected function _errorHandling()
    {
        $app = $this->_app;

        $app->error(function (\Exception $e, $code) use ($app) {

            if ($app['debug']) {
                return;
            }

            switch ($code) {
                case 404:
                    $msg = 'The requested page could not be found.';
                    break;
                default:
                    $msg = 'We are sorry, but something went terribly wrong.';
            }

            return new Response($msg, $code);
        });
    }
}
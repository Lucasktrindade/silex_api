<?php
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 28/10/2016
 * Time: 15:22
 */
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Game\Providers\DatabaseServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});
include __DIR__ . '/routes.php';



return $app;
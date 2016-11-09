<?php

namespace Game\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
/**
 * Created by PhpStorm.
 * User: lucas.trindade
 * Date: 25/10/2016
 * Time: 18:57
 */
class DatabaseServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'port'      => 3306,
            'database'  => 'mydb',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        return $capsule;
    }
}
<?php

/*
 * This file is part of the CRUD Admin Generator project.
 *
 * Author: Jon Segador <jonseg@gmail.com>
 * Web: http://crud-admin-generator.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Silex\Application;

$app = new Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../web/views',
));
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.messages' => array(),
));
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(

        'dbs.options' => array(
            'db' => array(
                'driver' => 'pdo_mysql',
                'dbname' => 'DATABASE_NAME',
                'host' => '127.0.0.1',
                'user' => 'DATABASE_USER',
                'password' => 'DATABASE_PASS',
                'charset' => 'utf8',
            ),
        )
));

$app->register(new FranMoreno\Silex\Provider\PagerfantaServiceProvider());
$app['pagerfanta.view.options'] = array(
    'routeName'        => null,
    'routeParams'      => array(),
    'pageParameter'    => '[page]',
    'proximity'        => 3,
    'next_message'     => '&raquo;',
    'previous_message' => '&laquo;',
    'default_view'     => 'twitter_bootstrap3'
);



$app['asset_path'] = '/resources';
$app['debug'] = true;

return $app;

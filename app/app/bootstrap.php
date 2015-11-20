<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Silex\Application;
use TM\Provider\SitemapServiceProvider;
use TM\Website\Provider\YamlConfigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\TwigServiceProvider;
use TM\Website\Controller\DefaultController;

$app = new Application;

$app['charset'] = 'utf8';
$app['debug'] = false;
$app['config'] = $app->share(function() use ($app) {
    return ['file' => __DIR__ . '/config/parameters.yml'];
});

$app->mount('/', new DefaultController);

$app->register(new SitemapServiceProvider);
$app->register(new YamlConfigServiceProvider($app['config']['file']));
$app->register(new UrlGeneratorServiceProvider);
$app->register(new TwigServiceProvider, [
    'twig.path' => __DIR__ . '/../resources/views',
    'twig.options' => [
        'cache' => __DIR__ . '/cache/twig',
        'strict_variables' => false,
    ]
]);

return $app;

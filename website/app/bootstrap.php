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
$app['environment'] = $app->share(function() {
    $env = getenv('APP_ENV');

    if (false !== $env) {
        return $env;
    }

    if ($_SERVER['USER'] == 'web') {
        return 'prod';
    }

    return 'dev';
});
$app['config'] = $app->share(function() use ($app) {
    return ['file' => sprintf(__DIR__ . '/config/parameters_%s.yml', $app['environment'])];
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
/* @var $twig \Twig_Environment */
$twig = $app['twig'];
$twig->addFilter('trans*', new Twig_Filter_Function(function($string) {
    return $string;
}));

return $app;
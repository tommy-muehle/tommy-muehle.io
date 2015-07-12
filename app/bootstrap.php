<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new \Silex\Application();
$app['charset'] = 'utf8';
$app['debug']  = true;
$app['config'] = ['file' => __DIR__ . '/config/parameters_dev.yml'];
$app['environment'] = $app->share(function() {
    $env = getenv('APP_ENV');

    if (false !== $env) {
        return $env;
    }

    if (false === $env && $_SERVER['USER'] == 'web') {
        return 'prod';
    }

    return 'dev';
});

if ('prod' === $app['environment']) {
    $app['debug']  = false;
    $app['config'] = ['file' => __DIR__ . '/config/parameters_prod.yml'];
}

$app->register(new \TM\Provider\SitemapServiceProvider());
$app->register(new \TM\Website\Provider\YamlConfigServiceProvider($app['config']['file']));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), [
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

// Controller
$app->mount('/', new \TM\Website\Controller\DefaultController());

return $app;
<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new \Silex\Application();
$app['charset'] = 'utf8';
$app['environment'] = $app->share(function() {
    $env = getenv('APP_ENV');

    if (false === $env && $_SERVER['PWD'] == '/var/www/tommy-muehle_de') {
        return 'prod';
    }

    return 'dev';
});

if ($app['environment'] === 'prod') {
    $app['debug']  = false;
    $app['config'] = array('file' => __DIR__ . '/config/parameters_prod.yml');
} else {
    $app['debug']  = true;
    $app['config'] = array('file' => __DIR__ . '/config/parameters_dev.yml');
}

// Provider
$app->register(new \TM\Provider\YamlConfigServiceProvider($app['config']['file']));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../resources/views',
    'twig.options' => array(
        'cache' => __DIR__ . '/cache/twig',
        'strict_variables' => false,
    )
));
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'user'     => $app['config']['db_user'],
        'host'     => $app['config']['db_host'],
        'dbname'   => $app['config']['db_name'],
        'password' => $app['config']['db_pass'],
        'charset'  => 'utf8'
    )
));
$app->register(new TM\Provider\DoctrineORMServiceProvider(), array(
    'orm.options' => array(
        'proxies_dir' => __DIR__ . '/cache/doctrine/proxies',
        'entity_dirs' => array(
            array('path' => __DIR__ . '/../src/TM/Entity'),
        ),
        'annotations' => array(
            __DIR__ . '/../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
        )
    )
));

/* @var $twig \Twig_Environment */
$twig = $app['twig'];
$twig->addFilter('trans*', new Twig_Filter_Function(function($string) {
    return $string;
}));

// Controller
$app->mount('/', new \TM\Controller\DefaultController());
$app->mount('/blog', new \TM\Controller\BlogController());

return $app;
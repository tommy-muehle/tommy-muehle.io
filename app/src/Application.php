<?php

namespace TM\Website;

use Silex\Application as BaseApplication;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use TM\Provider\SitemapServiceProvider;
use TM\Website\Controller\DefaultController;
use TM\Website\Provider\YamlConfigServiceProvider;

/**
 * @package TM\Website
 */
class Application extends BaseApplication
{
    /**
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        parent::__construct($values);

        $app = $this;

        $this['config'] = $app->share(function() use ($app) {
            return ['file' => __DIR__ . '/../config/parameters.yml'];
        });

        $this->register(new SitemapServiceProvider);
        $this->register(new YamlConfigServiceProvider($app['config']['file']));
        $this->register(new UrlGeneratorServiceProvider);
        $this->register(new TwigServiceProvider, [
            'twig.path' => __DIR__ . '/../resources/views',
            'twig.options' => [
                'cache' => __DIR__ . '/../cache/twig',
                'strict_variables' => false,
            ]
        ]);

        $this->mount('/', new DefaultController);
    }

}

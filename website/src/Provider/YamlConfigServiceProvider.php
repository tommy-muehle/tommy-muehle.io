<?php

namespace TM\Website\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlConfigServiceProvider
 *
 * @package TM\Website\Provider
 */
class YamlConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $file;

    /**
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * @param \Silex\Application $app
     */
    public function register(Application $app)
    {
        $config = Yaml::parse($this->file);

        if (isset($app['config']) && is_array($app['config'])) {
            $app['config'] = array_merge($app['config'], $config);
        } else {
            $app['config'] = $config;
        }
    }

    /**
     * @param \Silex\Application $app
     */
    public function boot(Application $app)
    {
    }
} 
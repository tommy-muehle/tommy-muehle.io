<?php

namespace TM\Controller;

use Silex\Application;

/**
 * Class BaseController
 *
 * @package TM\Controller
 */
abstract class BaseController
{
    /**
     * @param Application $app
     * @param string      $template
     * @param array       $variables
     *
     * @return string
     */
    protected function render(Application $app, $template, array $variables = array())
    {
        /* @var $twig \Twig_Environment */
        $twig = $app['twig'];

        return $twig->render($template, $variables);
    }

    /**
     * @param Application $app
     * @param string      $route
     * @param array       $parameters
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function redirect(Application $app, $route, array $parameters = array())
    {
        /* @var $urlGenerator \Symfony\Component\Routing\Generator\UrlGenerator */
        $urlGenerator = $app['url_generator'];
        $url          = $urlGenerator->generate($route, $parameters);

        return $app->redirect($url);
    }
} 
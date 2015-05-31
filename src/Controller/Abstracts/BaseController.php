<?php

namespace TM\Website\Controller\Abstracts;

use Silex\Application;

/**
 * Class BaseController
 *
 * @package TM\Website\Controller
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

        return $app->redirect($urlGenerator->generate($route, $parameters));
    }
} 
<?php

namespace TM\Website\Controller;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

use TM\Website\Controller\Abstracts\BaseController;

/**
 * Class DefaultController
 *
 * @package TM\Website\Controller
 */
class DefaultController extends BaseController implements ControllerProviderInterface
{
    /**
     * @param Application $app
     *
     * @return string
     */
    public function indexAction(Application $app)
    {
        return $this->render($app, 'default/index.html.twig');
    }

    /**
     * @param Application $app
     *
     * @return string
     */
    public function imprintAction(Application $app)
    {
        return $this->render($app, 'default/imprint.html.twig');
    }

    /**
     * @param Application $app
     *
     * @return string
     */
    public function notFoundAction(Application $app)
    {
        return $this->render($app, 'default/notFound.html.twig');
    }

    /**
     * @param Application $app
     *
     * @return string
     */
    public function postcardsAction(Application $app)
    {
        return $this->render($app, 'default/postcards.html.twig');
    }

    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $defaultController = $app['controllers_factory'];

        /* @var $defaultController \Silex\ControllerCollection */
        $defaultController->match('/', [$this, 'indexAction'])->bind('default.index');
        $defaultController->match('/imprint', [$this, 'imprintAction'])->bind('default.imprint');
        $defaultController->match('/404', [$this, 'notFoundAction'])->bind('default.notFound');
        $defaultController->match('/postcards', [$this, 'postcardsAction'])->bind('default.postcards');

        return $defaultController;
    }
}

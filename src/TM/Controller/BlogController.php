<?php

namespace TM\Controller;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

use TM\Entity\Category;
use TM\Entity\Post;

/**
 * Class BlogController
 *
 * @package TM\Controller
 */
class BlogController extends BaseController implements ControllerProviderInterface
{
    /**
     * @param Application $app
     *
     * @return string
     */
    public function listAction(Application $app)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $app['orm.em'];

        $variables = array(
            'posts' => $em->getRepository('TM\Entity\Post')->findBy(
                array('isPublished' => true),
                array('created' => 'desc')
            )
        );

        return $this->render($app, 'blog/list.html.twig', $variables);
    }

    public function rssAction(Application $app)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $app['orm.em'];

        $variables = array(
            'posts' => $em->getRepository('TM\Entity\Post')->findBy(
                    array('isPublished' => true),
                    array('created' => 'desc')
                )
        );

        return $this->render($app, 'blog/list.rss.twig', $variables);
    }

    /**
     * @param Application $app
     * @param int         $year
     * @param int         $month
     * @param int         $day
     * @param string      $title
     *
     * @return string
     */
    public function showAction(Application $app, $year, $month, $day, $title)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $app['orm.em'];

        $post = $em->getRepository('TM\Entity\Post')->findOneBy(array(
            'isPublished' => true,
            'urlTitle'    => $title
        ));

        if (!$post instanceof Post) {
            $this->redirect($app, 'default.notFound');
        }

        return $this->render($app, 'blog/show.html.twig', array('post' => $post));
    }

    /**
     * @param Application $app
     * @param string      $title
     *
     * @return string
     */
    public function categoryAction(Application $app, $title)
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $app['orm.em'];

        $category = $em->getRepository('TM\Entity\Category')->findOneBy(
            array('urlTitle' => $title)
        );

        if (!$category instanceof Category) {
            return $this->redirect($app, 'default.notFound');
        }

        $variables = array('posts' => $category->getPublishedPosts());

        return $this->render($app, 'blog/list.html.twig', $variables);
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
        $blogController = $app['controllers_factory'];

        /* @var $blogController \Silex\ControllerCollection */
        $blogController->get('/', array($this, 'listAction'))->bind('blog.list');
        $blogController->get('/rss', array($this, 'rssAction'))->bind('blog.rss');
        $blogController->get('/{year}/{month}/{day}/{title}', array($this, 'showAction'))->bind('blog.show');
        $blogController->get('/category/{title}', array($this, 'categoryAction'))->bind('blog.category');

        return $blogController;
    }

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

        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $app['orm.em'];

        $categories = $em->getRepository('TM\Entity\Category')->findAll();
        $tags = $em->getRepository('TM\Entity\Tag')->findAll();

        $variables = array_merge(array(
                'tags' => $tags,
                'categories' => $categories
            ),
            $variables
        );

        return $twig->render($template, $variables);
    }
} 
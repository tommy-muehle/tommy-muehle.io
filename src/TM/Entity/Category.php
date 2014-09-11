<?php

namespace TM\Entity;

use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Category
 *
 * @Table(name="blog_category")
 * @Entity(repositoryClass="TM\Entity\CategoryRepository")
 *
 * @package TM\Entity
 */
class Category extends Base
{
    /**
     * @var string
     *
     * @Column(type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    protected $description;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ManyToMany(targetEntity="Post", mappedBy="categories")
     */
    protected $posts;

    /**
     * @var string
     *
     * @Column(name="url_title", type="string")
     */
    protected $urlTitle;

    /**
     *
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $posts
     */
    public function setPosts(ArrayCollection $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPublishedPosts()
    {
        $posts = new ArrayCollection();

        /* @var $post \TM\Entity\Post */
        foreach ($this->posts as $post) {
            if ($post->getIsPublished() === true) {
                $posts->add($post);
            }
        }

        return $posts;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * @param string $urlTitle
     */
    public function setUrlTitle($urlTitle)
    {
        $this->urlTitle = $urlTitle;
    }

    /**
     * @return string
     */
    public function getUrlTitle()
    {
        return $this->urlTitle;
    }
} 
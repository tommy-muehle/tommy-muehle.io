<?php

namespace TM\Entity;

use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Tag
 *
 * @Table(name="blog_tag")
 * @Entity(repositoryClass="TM\Entity\TagRepository")
 *
 * @package TM\Entity
 */
class Tag extends Base
{
    /**
     * @var string
     *
     * @Column(type="string")
     */
    protected $name;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $posts;

    /**
     *
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
} 
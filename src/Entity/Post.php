<?php

namespace TM\Website\Entity;

use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\PreUpdate;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\Common\Collections\ArrayCollection;

use TM\Website\Entity\Abstracts\Base;

/**
 * Class Post
 *
 * @Table(name="blog_post")
 * @Entity(repositoryClass="TM\Entity\PostRepository")
 *
 * @package TM\Website\Entity
 */
class Post extends Base
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
    protected $introduction;

    /**
     * @var string
     *
     * @Column(name="content_file", type="string")
     */
    protected $contentFile;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ManyToMany(targetEntity="Tag")
     * @JoinTable(name="blog_post_to_tag",
     *      joinColumns={@JoinColumn(name="post_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="tag_id", referencedColumnName="id")}
     *      )
     */
    protected $tags;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ManyToMany(targetEntity="Category", inversedBy="posts")
     * @JoinTable(name="blog_post_to_category")
     */
    protected $categories;

    /**
     * @var bool
     *
     * @Column(name="is_published", type="boolean")
     */
    protected $isPublished = false;

    /**
     * @var \DateTime
     *
     * @Column(type="datetime")
     */
    protected $created;

    /**
     * @var \DateTime
     *
     * @Column(type="datetime")
     */
    protected $updated;

    /**
     * @var string
     *
     * @Column(name="url_title", type="string")
     */
    protected $urlTitle;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->created = new \DateTime();
        $this->updated = new \DateTime();
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $categories
     */
    public function setCategories(ArrayCollection $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param string $file
     */
    public function setContentFile($file)
    {
        $this->contentFile = $file;
    }

    /**
     * @return string
     */
    public function getContentFile()
    {
        return $this->contentFile;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param boolean $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = (bool) $isPublished;
    }

    /**
     * @return boolean
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $tags
     */
    public function setTags(ArrayCollection $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
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
     * @PreUpdate
     */
    public function setUpdated()
    {
        $this->updated = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
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

    /**
     * @param string $introduction
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;
    }

    /**
     * @return string
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }
} 
<?php

namespace TM\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * Class Base
 *
 * @MappedSuperclass
 *
 * @package TM\Entity
 */
abstract class Base
{
    /**
     * @var int
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;
} 
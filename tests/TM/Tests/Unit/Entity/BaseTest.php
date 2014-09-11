<?php

namespace TM\Tests\Entity;

/**
 * Class BaseTest
 *
 * @package TM\Tests\Entity
 */
class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testBaseEntityHavePropertyId()
    {
        $reflectionClass = new \ReflectionClass('TM\Entity\Base');

        $this->assertTrue($reflectionClass->getProperty('id')->isProtected());
    }

    public function testBaseEntityIsMappedAsSuperclass()
    {
        $reflectionClass = new \ReflectionClass('TM\Entity\Base');
        $phpDoc = $reflectionClass->getDocComment();

        $this->assertRegExp('/@MappedSuperclass/', $phpDoc);
    }
} 
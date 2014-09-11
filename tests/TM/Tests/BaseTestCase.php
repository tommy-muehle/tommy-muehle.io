<?php

namespace TM\Tests;

/**
 * Class BaseTestCase
 *
 * @package TM\Tests
 */
class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Silex\Application
     */
    protected $app;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->app = require_once __DIR__ . '/../../bootstrap.php';
    }
} 
<?php

namespace TM\Tests;

use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\ORM\Tools\SchemaTool;

/**
 * Class SqliteTestCase
 *
 * @package TM\Tests
 */
class SqliteTestCase extends BaseTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->em = $this->app['orm.em'];
        $this->generateSchema();
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->dropDatabase();
    }

    /**
     * Generates the schema in sqlite database.
     *
     * @throws \Doctrine\DBAL\Schema\SchemaException
     */
    protected function generateSchema()
    {
        $metadata = $this->em->getMetadataFactory()->getAllMetadata();

        if (!empty($metadata)) {
            $tool = new SchemaTool($this->em);
            $tool->createSchema($metadata);
        } else {
            throw new SchemaException('No metadata classes to process.');
        }
    }

    /**
     * Drops the sqlite database.
     */
    protected function dropDatabase()
    {
        $tool = new SchemaTool($this->em);
        $tool->dropDatabase();

        $this->em->close();
    }
} 
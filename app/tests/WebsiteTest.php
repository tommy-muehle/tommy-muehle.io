<?php

namespace TM\Website\Tests;

use Silex\WebTestCase;

/**
 * Class WebsiteTest
 *
 * @package TM\Website\Tests
 */
class WebsiteTest extends WebTestCase
{
    /**
     * Try to find one h1 with "Tommy" and the
     * three sections (profile, about me and contact).
     */
    public function testInitialPage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('h1:contains("Tommy")'));
        $this->assertEquals(3, $crawler->filter('section')->count());
    }

    /**
     * Try to find one h2 with "Impressum" and the two sections (profile and impressum).
     */
    public function testContectPage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/impressum');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('h2:contains("Impressum")'));
        $this->assertEquals(2, $crawler->filter('section')->count());
    }

    /**
     * @return \Silex\Application
     */
    public function createApplication()
    {
        $app = require realpath(__DIR__ . '/../app/bootstrap.php');
        $app['debug'] = true;

        return $app;
    }
}

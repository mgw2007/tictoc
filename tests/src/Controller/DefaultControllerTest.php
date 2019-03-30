<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddressBookControllerTest extends WebTestCase
{

    protected $client;

    public function setUp()
    {

        $this->client = static::createClient();
    }


    public function testIndex()
    {
        $this->client->request('GET', '/');

        $response = $this->client->getResponse()->getContent();
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains("Tic", $response);

    }


}
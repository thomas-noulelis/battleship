<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Controller\DefaultController;


class DefaultControllerTest extends WebTestCase
{
    //public function setUP(){
    //  require_once 'DefaultController.php';
    //}

    public function testIndexAction(){
        $test = array();
        $this->assertEquals(0,count($test));

        array_push($test, 'foo');
        $this->assertEquals('foo', $test[count($test)-1]);
        $this->assertEquals(1, count($test));

        $this->assertEquals('foo',array_pop($test));
        $this->assertEquals(0, count($test));
    }

    public function testStrikeAction(){

    }

    public function testCheckCoordinates(){

    }

    public function testOutputGrid(){

    }

    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    request(
    $method,
    $uri,
    array $parameters = array(),
    array $files = array(),
    array $server = array(),
    $content = null,
    $changeHistory = true
)
}

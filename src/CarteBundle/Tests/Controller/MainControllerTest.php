<?php

namespace CarteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testRanking()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ranking');
    }

    public function testTourchoice()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tourchoice');
    }

}

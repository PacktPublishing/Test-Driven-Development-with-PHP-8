<?php

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TableControllerTest extends WebTestCase
{
    public function testCanLoadTable(): void
    {
        $client     = static::createClient();
        $crawler    = $client->request('GET', '/table');
        $html       = $crawler->html();
        $url        = $crawler->getBaseHref();
        $this->assertResponseIsSuccessful();
    }
}